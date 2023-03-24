<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{ $user->name }}</title>
</head>

<body>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" value="{{ $user->password }}">
        <label for="password_confirmation">Confirmation du mot de passe</label>
        <input type="password" name="password_confirmation" id="password_confirmation" value="{{ $user->password }}">
        <label for="birthday">Anniversaire</label>
        <input type="date" name="birthday" id="birthday" value="{{ $user->birthday->format('Y-m-d') }}">
        <button type="submit">Modifier</button>
    </form>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>
