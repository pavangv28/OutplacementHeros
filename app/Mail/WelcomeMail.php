<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $cname;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$cname)
    {
       $this->name=$name;
       $this->cname=$cname;
       // $this->cname=$cname;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(' Welcome to OutplacementHeros')
                    ->markdown('emails.welcome');
       //return $this->from('pavangv3408@gmail.com')
           //     ->view('emails.welcome')

            
    }
}
