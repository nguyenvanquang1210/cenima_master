<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMailMuaVe extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct($dataMail)
    {
        $this->data = $dataMail;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function build()
    {
        return $this->subject('Thông báo đã đặt vé thành công....')
                    ->view('client.mail_mua_ve_thanh_cong', [
                        'data' => $this->data
                    ]);
    }
}
