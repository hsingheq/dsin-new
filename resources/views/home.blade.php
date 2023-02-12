<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--     <meta name="google-signin-client_id" content="1025670132685-37hrges92kupea5uke7rh43r6rh49t7f.apps.googleusercontent.com"> --}}
    
  
    <title>{{ get_setting('title') }}</title>
    @if (is_null(get_setting('favicon')) OR get_setting('favicon')=='')   
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    @else  
    <link rel="icon" type="image/png" sizes="32x32" href="{{ uploaded_asset(get_setting('favicon')) }}">
    @endif
   {{--  <script src="" async defer></script> --}}
	
</head>
<body>
    
    
    
    <div id="app"></div>

</body>

  @vite('resources/js/app.js') 
{{-- <script src="{{ asset('resources/js/app.js') }}" defer></script> --}}
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
<script>
   
</script>

</html>