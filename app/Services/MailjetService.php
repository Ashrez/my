<?php
namespace App\Services;

use Mailjet\Client;
use Mailjet\Resources;
use Illuminate\Support\Facades\Log;

class MailjetService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(
            env('MAILJET_API_KEY'),
            env('MAILJET_API_SECRET'),
            true,
            ['version' => 'v3.1']
        );
    }

    /**
     * Kirim email via Mailjet API
     *
     * @param string $to Email tujuan
     * @param string $subject Subject email
     * @param string $htmlBody Body email dalam HTML
     * @param string|null $from Email pengirim (opsional)
     * @param string|null $fromName Nama pengirim (opsional)
     * @param string|null $toName Nama penerima (opsional)
     * @return bool|array True jika sukses, array error jika gagal
     */
    public function sendEmail($to, $subject, $htmlBody, $from = null, $fromName = null, $toName = null)
    {
        $from = $from ?: env('MAIL_FROM_ADDRESS');
        $fromName = $fromName ?: env('MAIL_FROM_NAME');
        $toName = $toName ?: $to;

        $requestBody = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $from,
                        'Name' => $fromName,
                    ],
                    'To' => [
                        [
                            'Email' => $to,
                            'Name' => $toName,
                        ]
                    ],
                    'Subject' => $subject,
                    'TextPart' => strip_tags($htmlBody),
                    'HTMLPart' => $htmlBody,
                ]
            ]
        ];

        $response = $this->client->post(Resources::$Email, ['body' => $requestBody]);

        if (!$response->success()) {
            Log::error('Mailjet error: ' . json_encode($response->getData()));
            return $response->getData(); // Kembalikan data error jika gagal
        }

        return true; // Sukses
    }
}
