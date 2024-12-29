<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset OTP</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f3f4f6;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

       h1{
        color: orangered
       }

        .content {
            text-align: start;
        }

        .otp {
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #333333;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #45a049;
        }

        .footer {
            margin-top: 20px;
            text-align: start;
            color: #999999;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img width="170px" src="{{ $message->embed(public_path('assets/img/logo.png')) }}" alt="Company Logo">
        </div>
        <div class="content">
            <p>Hello,</p>
            <p>You recently requested to reset your password for your account.</p>
            <p>Your OTP (One-Time Password) is:</p>
            <p class="otp">{{ $randomNumber }}</p>
            <p>If you did not request this password reset, please ignore this email.</p>
        </div>
        <div class="footer">
            <p>Thank you,</p>
            <p>Rafusoft</p>
        </div>
    </div>
</body>
</html>

