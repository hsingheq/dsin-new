<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['title']}}</title>
    @if (is_null(get_setting('favicon')) OR get_setting('favicon')=='')   
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    @else  
    <link rel="icon" type="image/png" sizes="32x32" href="{{ get_uploaded_image_url(get_setting('favicon')) }}">
    @endif	
    @vite(['resources/js/app.js', 'resources/css/app.css']) 
</head>

    <body>

    <h3>{{ $data['body'] }}</h3>
    <a href = "{{ $data['url'] }}">Click here To email Verify </a>
    <p>Thank You</p>

    </body>
    </html>