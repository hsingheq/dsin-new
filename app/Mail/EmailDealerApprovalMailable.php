<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailDealerApprovalMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $subject, $data;
    
    public function __construct($subject, $data)
    {
        $this->data = $data;
        $this->subject = $subject;
    }
   
    
    public function build()
    {
        return $this->markdown('Email.EmailDealerApproval')->with([ 
            'data' => $this->data
        ])->subject($this->subject);
    }
}