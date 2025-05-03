<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact Form Submission</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f4f4; padding: 20px; margin: 0;">
    <div style="max-width: 600px; margin: auto; background: #fff; border: 1px solid #ccc; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">

        <!-- Header -->
        <div style="background-color: #1e2a38; padding: 20px; color: #ffffff; text-align: center;">
            <div style="font-size: 36px; margin-bottom: 10px;">⚖️</div>
            <h2 style="margin: 0; font-size: 24px;">Seeraj Legal</h2>
            <p style="margin: 5px 0 0; font-size: 14px; color: #cccccc;">New Contact Form Submission</p>
        </div>

        <!-- Body -->
        <div style="padding: 20px; color: #333;">
            <p style="margin-bottom: 10px;"><strong style="color: #555;">Name:</strong> {{ $data['name'] }}</p>
            <p style="margin-bottom: 10px;"><strong style="color: #555;">Email:</strong> <a href="mailto:{{ $data['email'] }}" style="color: #1a73e8;">{{ $data['email'] }}</a></p>
            <p style="margin-bottom: 10px;"><strong style="color: #555;">Message:</strong></p>
            <p style="white-space: pre-wrap; background: #f9f9f9; padding: 10px; border-left: 4px solid #1e2a38; border-radius: 4px; color: #444;">{{ $data['message'] }}</p>
        </div>

        <!-- Footer -->
        <div style="background-color: #f1f1f1; padding: 15px 20px; font-size: 12px; color: #777;">
            This message was sent from the contact form on your website.
        </div>
    </div>
</body>
</html>

