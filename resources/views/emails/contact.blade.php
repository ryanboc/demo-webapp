<!DOCTYPE html>
<html>
<head>
    <title>New Inquiry</title>
</head>
<body style="font-family: sans-serif;">
    <h2>New Contact Form Submission</h2>
    
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    
    <hr>
    
    <p><strong>Message:</strong></p>
    <p style="background: #f3f4f6; padding: 15px;">{{ $data['message'] }}</p>
</body>
</html>