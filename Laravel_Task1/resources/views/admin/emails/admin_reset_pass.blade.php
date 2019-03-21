@component('mail::message')
# Introduction
Welcom {{$data['data']->name}}<br>
The body of your message.

@component('mail::button', ['url' => aurl('reset/password/'.$data['token'])])
Click Here To Reset Your Password
@endcomponent
Copy This Link
<a href="aurl('reset/password/'.$data['token']">{{aurl('reset/password/'.$data['token'])}}</a><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
