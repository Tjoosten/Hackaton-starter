<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

/**
 * Class AuditController
 * 
 * @package App\Http\Controllers
 */
class AuditController extends Controller
{
    /**
     * Create new AuditController constructor. 
     * 
     * @return void
     */
    public function __construct() 
    {
        $this->middleware(['auth', 'role:admin|webmaster']);
    }

    /**
     * Method for displaying all the logged activity in the application.
     * 
     * @return Renderable
     */
    public function index(): Renderable
    {
        // TODO: Controller logic and view.
    }
}
