<?php

namespace App\Mail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Confirm extends Mailable
{
    use Queueable, SerializesModels;

    public $products ;
    public $user = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $product , User $users)
    {
        $this->products = $product;
        $this->user = $users;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
           return $this->from('ecofguide.alert@coficab.com', 'Ecofguide')
                        ->view('emails.request')->subject('REQUEST DATASHEET');

    }
}
