@component('mail::message')
# Hello

{{$data['message']}}

@component('mail::button', ['url' => '#'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent