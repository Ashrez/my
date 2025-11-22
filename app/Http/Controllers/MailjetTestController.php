<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MailjetService;

class MailjetTestController extends Controller
{
    public function sendTestEmail(Request $request)
    {
        $to = $request->input('to', 'recipient@email.com');
        $subject = 'Test Email via Mailjet';
        $body = '<h1>Ini email transaksi dari Mailjet!</h1><p>Contoh pengiriman email menggunakan Mailjet API di Laravel.</p>';

        $mailjet = new MailjetService();
        $success = $mailjet->sendEmail($to, $subject, $body);

        return response()->json([
            'success' => $success,
            'message' => $success ? 'Email berhasil dikirim!' : 'Gagal mengirim email.'
        ]);
    }
}
