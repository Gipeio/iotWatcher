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
        @foreach ($users as $user)
            <li>{{ $user->nom }} - {{ $user->email }}</li>
        @endforeach
    </ul>
</body>
</html>
