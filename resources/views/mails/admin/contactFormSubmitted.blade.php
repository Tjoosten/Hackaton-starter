@component('mail::message')
# New reaction

Hello,

A visitor submitted a new response on [{{ Request::getHost() }}]({{ url('/') }}).

@component('mail::panel')
Name: {{ $formResponse->name }} <br>
Telephone: {{ $formResponse->phone_number }} <br>
E-mail: {{ $formResponse->email }} <br>
Referer: {{ $formResponse->referer ?? 'Unknown' }} <br>
@endcomponent

@slot('subcopy')
Download all previous responses on [{{ config('app.url') }}]({{ route('responses.download') }}).
@endslot
@endcomponent