@component('mail::message')
<h3>Message Details:</h3>
<p><strong>Sender Name :</strong> {{$data['firstname']}} {{$data['lastname']}}</p>
<p><strong>Sender Email :</strong> {{$data['email']}}</p>
<p>Sender Message :</p>
{{$data['message']}}


@component('mail::button', ['url' => 'mailto:'.$data['email']])
Reply to
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
