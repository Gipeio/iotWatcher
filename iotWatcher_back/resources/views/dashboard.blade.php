<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Tableau de bord</h1>

    <!-- Affiche la liste des capteurs -->
    <ul>
        @foreach($capteurs as $capteur)
            <li>{{ $capteur->name }} - {{ $capteur->type }}</li>
        @endforeach
    </ul>
</body>
</html>
