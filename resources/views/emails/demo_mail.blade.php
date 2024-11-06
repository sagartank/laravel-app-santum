@component('mail::message')
# Introduction testdemo

The body of your message.
okkkkk

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
