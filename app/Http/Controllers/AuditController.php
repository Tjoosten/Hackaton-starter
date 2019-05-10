<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Spatie\Activitylog\Models\Activity;

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
        $logs = Activity::simplePaginate();
        return view('audit.overview', compact('logs'));
    }
}
