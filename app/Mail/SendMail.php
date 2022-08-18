<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
     protected $details;
    public function __construct($details)
    {
        $this->details = $details;
    }
    public function build()
    {
        return $this->from('huy.dev.2010@gmail.com', 'SIMEN')
            ->subject($this->details['subject'])
            ->markdown('email')
            ->with([
                'name' => $this->details['name'],
                'content' => $this->details['content'],
                // 'orderPrice' => $this->order->price,
            ]);
    }
}
