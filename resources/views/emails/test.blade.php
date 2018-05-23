@component('mail::message')
# Test mail

Hi, I'm {{ $user->name }}, I just wanted to say hello :)

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::panel')
This is the panel content.
@endcomponent

Thanks,<br>
Message sent via {{ config('app.name') }}
@endcomponent
