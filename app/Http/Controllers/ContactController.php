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
    /**
     * Method for handling the contact form and notiying the webmaster(s)
     * 
     * @param  ContactValidator $input The form request class that handles the validation
     * @return RedirectResponse
     */
    public function handleResponse(ContactValidator $input): RedirectResponse
    {
        //
    }
}
