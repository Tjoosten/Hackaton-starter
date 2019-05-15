<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactValidator;

/**
 * Class ContactController
 * 
 * @package App\Http\Controller
 */
class ContactController extends Controller
{
    public function index(): Renderable 
    {
        return view('contact');
    }

    public function handleResponse(ContactValidator $input): RedirectResponse
    {
        //
    }
}
