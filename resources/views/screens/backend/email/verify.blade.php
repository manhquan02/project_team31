<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification Email</title>
</head>
<body>
<h3>{{ 'Gym T&T'.' '. translate('Email verification letter') }}</h3>
<span>{{ $data['code'].' '.translate('is your verification code')}}</span>
</body>
</html>
