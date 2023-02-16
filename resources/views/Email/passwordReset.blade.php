@component('mail::message')
# Hello

You are receiving this email because we received a password reset request for your account.

<?php
    $url = config('app.url');
?>
@component('mail::button', ['url' => $url.'/password/reset/'.$token])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent