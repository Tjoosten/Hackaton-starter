<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use App\User;
use Illuminate\Support\Facades\Password;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Users\StoreValidator;
use Illuminate\Support\Str;
use App\Rules\PasswordCheck;
use App\Http\Requests\Users\Settings\InformationValidator;

/**
 * Class DashboardController
 * 
 * @package App\Http\Controllers\Users
 */
class DashboardController extends Controller
{
    /**
     * Create new DashboardController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('role:admin|webmaster')->except(['destroy', 'show']);
    }

    /**
     * Method for displaying the dashboard page for the application users.
     * 
     * @param  null|string  $type  The scope name of users u want to display. Default to all users.
     * @param  User         $users The database model class for the users table. 
     * @return Renderable
     */
    public function index(?string $type = null, User $users): Renderable
    {
        return view('users.dashboard', ['users' => $users->simplePaginate()]);
    }

    /**
     * Method for displaying the user information in the application. 
     * 
     * @param  User $user The resource entity from the given user. 
     * @return Renderable
     */
    public function show(User $user): Renderable 
    {
        // If the authenticated user is not the given user. We need the view authorization check. 
        if (! $this->getAuthenticatedUser()->is($user)) {
            $this->authorize('view', User::class);
        }

        $cantEdit = ! $this->getAuthenticatedUser()->cannot('update', $user);
        return view('users.information', compact('user', 'cantEdit'));
    }

    /**
     * Method to render the view for creating new users in the application. 
     * 
     * @param  Role $role The database model class fot the ACl roles in the application. 
     * @return Renderable 
     */
    public function create(Role $roles): Renderable 
    {
        // We duplicate the name column because the ->assignRole(); method from spatie/laravel-permissions
        // Works bases on the role name not the id. The other 'name' is used to display the role name. 

        $roles = $roles->pluck('name', 'name');
        return view('users.create', ['roles' => $roles->all()]);
    }

    /**
     * Method for updating the account information in the application. 
     *
     * @param  InformationValidator $input The form request class that handles the validation.
     * @param  User                 $user  The resource entity from the given user. 
     * @return RedirectResponse
     */
    public function update(InformationValidator $input, User $user): RedirectResponse 
    { 
        if ($user->update($input->all())) {
            if (! $this->getAuthenticatedUser()->is($user)) {
                $this->logActivity('Updated the account information from' . $user->name, 'Users');
                flash("The account information from {$user->name} has been updated");
            } else {
                flash('Your account information as been updated.');
            }
        }

        return redirect()->route('users.show', $user);
    }

    /**
     * Method for storing the new user in the application. 
     * 
     * @param  StoreValidator $input    The from request class that handles the validation.
     * @param  User           $user     The database model for the user table. 
     * @return RedirectResponse
     */
    public function store(StoreValidator $input, User $user): RedirectResponse
    {
        $password = Str::random(9);
        $input->merge(['password' => $password]);

        if ($user = $user->create($input->except('role'))) {
            $user->syncRoles($input->roles);

            $this->logActivity("Created a user ({$user->name}) in the application.", 'Users');
            flash("The login for {$user->name} has been created in the application.")->important();
            Password::sendResetLink(['email' => $input->email]); // Send an reset link for the password to the user. 
        } 

        return redirect()->route('users.create');
    }

    /**
     * Method for deleting an user in the application.
     * 
     * @param  Request $request The request instance that holds all the request information. 
     * @param  User    $user    The resource entity from the given user. 
     * @return View|RedirectResponse 
     */
    public function destroy(Request $request, User $user) 
    {
        if ($request->isMethod('GET') && $this->getAuthenticatedUser()) {
            $viewPath = ($this->getAuthenticatedUser()->is($user)) ? 'users.settings.delete' : 'users.delete';
            return view($viewPath, compact('user'));
        } 

        // Proceed with the delete logic.
        abort_if($this->getAuthenticatedUser()->is($user) || ! $this->getAuthenticatedUser()->hasRole('admin|webmaster'), 403);
        $request->validate(['current_password' => ['required', new PasswordCheck()]]);

        // Confirm if the given user is actually deleted. 
        if ($user->delete()) {
            if (! $this->getAuthenticatedUser()->is($user)) {
                $this->logActivity("Has deleted the login from {$user->name}.", 'Users');
            }

            flash("The login from {$user->name} has been deleted in the application.")->important();
        }

        return redirect()->route('users.dashboard');
    }
}
