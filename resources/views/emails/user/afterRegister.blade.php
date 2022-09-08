@component('mail::message')
    # Welcome!

    Hi, {{ $user->name }}<br>

    Welcome to laracamp, your account has been created successfully. Now you can choose your best macth camp!

    @component('mail::button', ['url' => route('login')])
        Login Here
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
