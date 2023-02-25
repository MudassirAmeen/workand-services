<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewPolicy extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @param array $data The form data
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
        try {
            return $this->from(env('MAIL_FROM_ADDRESS'))
                        ->subject("Privacy Policy Changed")
                        ->view('EmailsBody.newPolicyAdded')
                        ->with([
                            'data' => $this->data,
                        ]);
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'Maximum execution time of') !== false){
                return response()->json([
                    'message' => 'The operation time out. Please try again later'
                ], 500);
            }
        }
    }
}
