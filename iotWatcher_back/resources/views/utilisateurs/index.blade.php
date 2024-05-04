<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des utilisateurs</h1>

    <ul>
        @foreach ($utilisateurs as $utilisateur)
            <li>{{ $utilisateur->nom }} - {{ $utilisateur->email }}</li>
        @endforeach
    </ul>
</body>
</html>
