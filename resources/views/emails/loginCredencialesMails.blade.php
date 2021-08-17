@component('mail::message')
# Tus credenciales para acceder al sistema {{ config('app.name')}}

Usa estas credenciales para acceder al sistema, se recomienda cambiar la contraseña

@component('mail::table')

| Usuario | Clave |
|:---------|:-----|
| {{$user->email}} | {{$password}}|

@endcomponent

@component('mail::button', ['url' => route('home')])
Inicio de sesion
@endcomponent

Gracias,<br>

No responder a este mensaje, es creado de forma automatica
{{ config('app.name') }}
@endcomponent
