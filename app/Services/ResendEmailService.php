<?php

namespace App\Services;

use Resend\Resend; // ← WAJIB ADA!

class ResendEmailService
{
    protected $resend;

    public function __construct()
    {
        $this->resend = Resend::client(env('RESEND_API_KEY'));
    }

    public function send($to, $subject, $html)
    {
        return $this->resend->emails->send([
            'from' => env('MAIL_FROM_NAME') . ' <' . env('MAIL_FROM_ADDRESS') . '>',
            'to' => $to,
            'subject' => $subject,
            'html' => $html,
        ]);
    }
}
