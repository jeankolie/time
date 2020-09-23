@component('mail::message')
Bienvenu {{ $user->prenom }} {{ $user->nom }}<br>

{{ $message }}<br>

@component('mail::button', ['url' => config('app.url').'/home/'])
Connectez-vous
@endcomponent

<br>
{{ config('app.name') }}
@endcomponent