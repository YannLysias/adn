<x-mail::message>
# Introduction

<p>Nous sommes ravis de vous informer que votre compte a été créé avec succès sur la plateforme d'Action pour le Développement National.</p>

<p>Vos identifiants de connexion sont les suivants :</p>

email : <b>{{ $user["email"] }}</b>
Mot de passe : <b>{{ $user["password"] }}</b>

Cliquez ici pour accéder a notre plateforme : 
<x-mail::button :url="$url">
    Accéder
</x-mail::button>

Cordialement,<br>
{{ config('app.name') }}
</x-mail::message>
