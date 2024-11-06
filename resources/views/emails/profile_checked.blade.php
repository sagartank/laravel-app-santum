@component('mail::message')
# Hi , {{$user->name}}

	checked your profile  for more info visit to  our site

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
visit now
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
