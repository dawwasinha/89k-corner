<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReportReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $reportReply;

    /**
     * Create a new message instance.
     */
    public function __construct($reportReply)
    {
        $this->reportReply = $reportReply;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Report Reply')
                    ->view('emails.report_reply');
    }
}
