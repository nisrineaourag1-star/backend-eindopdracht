<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .header { background: #0d0d0d; color: #F59E0B; padding: 20px; }
        .body { padding: 20px; }
        .field { margin-bottom: 12px; }
        .label { font-weight: bold; color: #555; }
        .message-box { background: #f5f5f5; padding: 15px; border-left: 4px solid #F59E0B; }
    </style>
</head>
<body>
    <div class="header">
        <h2>New Contact Message — Tomorrowland</h2>
    </div>
    <div class="body">
        <div class="field"><span class="label">From:</span> {{ $contactMessage->name }}</div>
        <div class="field"><span class="label">Email:</span> {{ $contactMessage->email }}</div>
        <div class="field"><span class="label">Subject:</span> {{ $contactMessage->subject }}</div>
        <div class="field">
            <div class="label">Message:</div>
            <div class="message-box">{{ $contactMessage->message }}</div>
        </div>
        <p style="color:#999;font-size:12px;margin-top:30px;">
            Received: {{ $contactMessage->created_at->format('d M Y H:i') }}
        </p>
    </div>
</body>
</html>
