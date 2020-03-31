@component('mail::message')
<strong>hello form the admistrator</strong>


Welcome to the future
@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
