<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestMail extends Mailable
{
    public $data;


    use Queueable, SerializesModels;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = "Message from " . $this->data['firstname'] . " " . $this->data['lastname'];

        if(isset($this->data['requestfile'])){
            return $this
            ->markdown('emails.quoterequestMail')
            ->subject($subject)
            ->with("data", $this->data)
            ->attach($this->data['requestfile'], [
                'as' => $this->data['firstname'] . '-attachment',
                'mime' => $this->data['requestfile']->getMimeType() ,
            ]);
        }

        return $this
        ->markdown('emails.quoterequestMail')
        ->subject($subject)
        ->with("data", $this->data);
    }
}
