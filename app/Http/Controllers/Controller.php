<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class Controller 
 * 
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Helper function for getting the information about the authenticated user. 
     * 
     * @return User
     */
    public function getAuthenticatedUser(): User
    {
        return auth()->user();
    }

    /**
     * Method for logging activities in the application to the audit log. 
     * 
     * @param  string $message  The message that needs to be logged. 
     * @param  string $name     The audit category name. Defaults to General 
     * @return void
     */
    public function logActivity(string $message, string $name = 'General'): void 
    {
        $user = $this->getAuthenticatedUser();
        activity($name)->causedBy($user)->log($message);
    }
}
