<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Konfirmasi Booking Tiket Wibufest</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin:0;
    padding:0;
    background-color:#f5f5f5;
}
.container {
    max-width:600px;
    margin:20px auto;
    background:#fff;
    border-radius:8px;
    padding:20px;
}
.header {
    text-align:center;
    margin-bottom:20px;
}
.header .logo {
    font-size:24px;
    font-weight:bold;
    color:#ef4444;
}
.header .title {
    font-size:20px;
    color:#374151;
    margin:5px 0 0 0;
}
.info-box {
    background:#f9fafb;
    border-left:4px solid #ef4444;
    padding:15px;
    border-radius:5px;
    margin:15px 0;
}
.info-row {
    display:flex;
    margin-bottom:10px;
}
.info-label {
    font-weight:600;
    color:#6b7280;
    width:120px;
}
.info-value {
    color:#111827;
}
.seats {
    background:#ef4444;
    color:#fff;
    padding:12px;
    text-align:center;
    border-radius:5px;
    margin:15px 0;
    font-weight:bold;
}
.note {
    background:#fef3c7;
    border-left:4px solid #f59e0b;
    padding:12px;
    border-radius:5px;
    font-size:14px;
    color:#92400e;
}
.footer {
    text-align:center;
    margin-top:20px;
    font-size:12px;
    color:#6b7280;
}
a.button {
    display:inline-block;
    background:#ef4444;
    color:white;
    padding:10px 20px;
    text-decoration:none;
    border-radius:5px;
    font-weight:bold;
    margin:15px 0;
}
</style>
</head>
<body>
<!-- Plain text fallback -->
<div style="display:none; white-space:pre;">
Halo {{ $booking->name }},
Terima kasih telah booking tiket Wibufest.
ID Booking: #{{ $booking->id }}
Kursi: {{ $seats }}
</div>

<div class="container">
    <div class="header">
        <div class="logo">Wibufest Jogja</div>
        <div class="title">Konfirmasi Booking Tiket</div>
    </div>

    <p>Halo <strong>{{ $booking->name }}</strong>,</p>
    <p>Terima kasih telah melakukan booking di <strong>Wiftix</strong>. Berikut detail booking Anda:</p>

    <div class="info-box">
        <div class="info-row">
            <span class="info-label">ID Booking:</span>
            <span class="info-value">#{{ $booking->id }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Nama:</span>
            <span class="info-value">{{ $booking->name }}</span>
        </div>
        <div class="info-row">
            <span class="info-label">Email:</span>
            <span class="info-value">{{ $booking->email }}</span>
        </div>
        @if($booking->film)
        <div class="info-row">
            <span class="info-label">Film:</span>
            <span class="info-value">{{ $booking->film->title }}</span>
        </div>
        @endif
    </div>

    <div class="seats">
        Nomor Kursi: {{ $seats }}
    </div>

    <div class="note">
        <strong>Catatan Penting:</strong>
        <ul style="margin:5px 0 0 20px; padding:0;">
            <li>Simpan email ini sebagai bukti booking</li>
            <li>Tunjukkan ID booking saat check-in</li>
            <li>Datang 30 menit sebelum Film diputar</li>
            <li>Bawa bukti pembayaran</li>
            <li>Lokasi: CGV JWalk, Yogyakarta</li>
        </ul>
    </div>

    <p>Terima kasih dan sampai jumpa!</p>

    <div class="footer">
        <p><strong>Wibufest Jogja</strong></p>
        <p>Email ini dikirim otomatis, mohon tidak membalas.</p>
        <p>© 2025 Wibufest. All rights reserved.</p>
    </div>
</div>
</body>
</html>
