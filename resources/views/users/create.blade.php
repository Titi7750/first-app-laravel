<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css">
    <title>Créer un utilisateur</title>
</head>

<body>
    <h1>Créer un utilisateur :</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <p>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name">
            @error('name')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            @error('email')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            @error('password')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <p>
            <label for="password_confirmation">Confirmation du mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
            @error('password_confirmation')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <p>
            <label for="birthday">Anniversaire</label>
            <input type="date" name="birthday" id="birthday">
            @error('birthday')
            <div>{{ $message }}</div>
        @enderror
        </p>
        <button type="submit">Créer</button>
    </form>
</body>

</html>
