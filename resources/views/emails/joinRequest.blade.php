@component('mail::message')
Hi {{ $team->captain()->pseudo }},

[{{ $user->pseudo }}]({{ asset('players/'.$user->id) }}) want to join your team.
To answer go to this [link]({{ asset('/players/teams') }}) and choose to accept or refuse his demand.

Message sent via {{ config('app.name') }} <br />
This mail has been sent automatically, please do not respond.
@endcomponent
