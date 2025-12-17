<!-- resources/views/profile.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
</head>
<body>
    <h2>Profil de {{ $user->name }}</h2>
    
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required>

        <button type="submit">Mettre à jour</button>
    </form>

    <a href="{{ route('home') }}">Retour à l'accueil</a>
</body>
</html>
