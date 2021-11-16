@component('mail::message')
<h3>{{$data['title']}}</h3>

<p>{{$data['description']}}</p>

<br>
Team {{ config('app.name') }}
@endcomponent
