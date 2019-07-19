<?php

namespace App\Http\Controllers\Users\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Users\Settings\PasswordValidator;
use App\Http\Requests\Users\Settings\InformationValidator;

/**
 * Class SettingsController 
 * 
 * @package App\Http\Controllers\Users\Profile
 */
class SecurityController extends Controller
{
    /**
     * Create new SettingsController constructor 
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Get the settings overview page for the authenticated user. 
     * 
     * @return Renderable 
     */
    public function index(): Renderable
    {
        return view('users.settings.security', ['user' => $this->getAuthenticatedUser()]);
    }

    /**
     * Method for updating his security settings in the application. 
     * 
     * @param  PasswordValidator $input The form request class that handles the validation.
     * @return RedirectResponse
     */
    public function update(PasswordValidator $input): RedirectResponse
    {
        if ($this->getAuthenticatedUser()->update($input->all())) {
            flash('Your account security has been updated.')->important();
        }

        return redirect()->route('profile.settings', ['type' => 'security']);
    }
}
