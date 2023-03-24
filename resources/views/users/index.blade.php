<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>

<body>
    <h1>Users :</h1>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <ul>
        @foreach ($users as $user)
            <li><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></li>
            <li><a href="{{ route('users.edit', $user) }}">Modifier</a></li>
        @endforeach
    </ul>
    <a href="{{ route('users.create') }}">Créer un utilisateur</a>
</body>

</html>
