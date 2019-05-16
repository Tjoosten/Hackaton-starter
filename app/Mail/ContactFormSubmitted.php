<?php

namespace App\Mail;

use Illuminate\Database\Eloquent\Collection;
use App\Models\FormResponse;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class ContactFormSubmitted
 * 
 * @package 
 */
class ContactFormSubmitted extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /** @var \App\Models\FormResponse */
    public $formResponse;
    
    /**
     * Create a new message instance.
     *
     * @param \App\Models\FormResponse $formResponse
     */
    public function __construct(FormResponse $formResponse)
    {
        $this->formResponse = $formResponse;
    }

    public function getRecipients(): Collection
    {
        // TODO: Register reciepients;
        return [];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->getRecipients())
            ->subject('New reaction on ' . config('app.url'))
            ->markdown('mails.admin.contactFormSubmitted');
    }
}
