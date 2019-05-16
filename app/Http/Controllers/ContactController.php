<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ContactValidator;
use App\Models\FormResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;

/**
 * Class ContactController
 * 
 * @package App\Http\Controller
 */
class ContactController extends Controller
{
    /**
     * Method for handling the contact form and notifying the webmaster(s)
     * 
     * @param  ContactValidator $input The form request class that handles the validation
     * @return RedirectResponse
     */
    public function handleResponse(ContactValidator $input): RedirectResponse
    {
        if ($formResponse = FormResponse::create($input->all())) {
            Mail::send(new ContactFormSubmitted($formResponse));
            flash('Thanks for your reply. We wil get in touch soon!', 'success');
        }

        return redirect()->route('contact.index');
    }

    /**
     * Controller action function for downloading all the responses in the application. 
     * 
     * @return void
     */
    public function downloadAll(): void
    {
        FormResponse::downloadAll();
    }
}
