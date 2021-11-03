<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HelloEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $fileAttachmentPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fileAttachmentPath)
    {
        $this->fileAttachmentPath = $fileAttachmentPath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.hello_email')
        ->attach($this->fileAttachmentPath);
    }
}
