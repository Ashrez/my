<?php

namespace App\Services;

use Resend\Resend;

class ResendMailer
{
    protected $resend;

    public function __construct()
    {
        $this->resend = new Resend(env('RESEND_API_KEY'));
    }

    public function send($to, $subject, $html)
    {
        return $this->resend->emails->send([
            'from' => env('MAIL_FROM_ADDRESS'),
            'to' => $to,
            'subject' => $subject,
            'html' => $html,
        ]);
    }
}
