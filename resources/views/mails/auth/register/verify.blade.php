@component('mail::message')
    # Подтверждение Email

    @component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
        Подтвердить
    @endcomponent

    Спасибо,<br>
    {{ config('app.name') }}
@endcomponent