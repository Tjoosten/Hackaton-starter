<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use App\User;

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
}
