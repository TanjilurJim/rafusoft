<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: start;
            align-items: center;
            padding: 1rem;
        }
       
        h1 {
            color: #333;
            text-align: start;
        }
        p {
            color: #666;
            line-height: 1.6;
            text-align: start;
        }
        .button {
            display: block;
            width: 200px;
            margin: 20px 0;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            color: #fff !important;
            background-color: #007bff;
            border-radius: 5px;
            font-size: 16px;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Hi there, {{$user->name}}!</h1>
        <p>Please check your email from Rafusoft to confirm your account for [your email address].
            The link can only be used once and expires in 10 minutes if you don’t use it. After confirmation, you can sign in.</p>
        <a href="{{ url('/confirm-email/' . $user->user_id) }}" class="button">Confirm Email</a>
        <p>If you need any support regarding verification or signing in, please contact info@rafusoft.com.</p>
    </div>
</body>
</html>
