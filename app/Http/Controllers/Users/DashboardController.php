<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\Users\StoreValidator;

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
        $this->middleware(['auth', 'role:admin|webmaster']);
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
     * Method to render the view for creating new users in the application. 
     * 
     * @param  Role $role The database model class fot the ACl roles in the application. 
     * @return Renderable 
     */
    public function create(Role $roles): Renderable 
    {
        // We duplicate the name column because the ->assignRole(); method form spatie/laravel-permissions
        // Works bases on the role name not the id. The other 'name' is used to display the role name. 

        $roles = $roles->pluck('name', 'name');
        return view('users.create', ['roles' => $roles->all()]);
    }

    /**
     * Method for storing the new user in the application. 
     * 
     * @todo Build up the validator 
     * 
     * @param  StoreValidator $input    The from request class that handles the validation.
     * @param  User           $user     The database model for the user table. 
     * @return RedirectResponse
     */
    public function store(StoreValidator $input, User $user): RedirectResponse
    {
        dd($input->all());
    }
}
