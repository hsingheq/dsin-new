@component('mail::message')
# Hello

You are receiving this email because we received a request for dealer registraion.

<?php
    
?>
@component('mail::button', ['url' => '#'])
Approve
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent