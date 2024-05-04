<!-- resources/views/capteurs/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Liste des capteurs</title>
</head>
<body>
    <h1>Liste des capteurs</h1>

    <!-- Affiche un message de succès ou d'erreur s'il y en a -->
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <!-- Affiche la liste des capteurs -->
    <ul>
        @foreach($capteurs as $capteur)
            <li>{{ $capteur->nom }} - {{ $capteur->type }} 
                <!-- Bouton de suppression pour chaque capteur -->
                <form action="{{ route('capteurs.destroy', $capteur->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>

    <!-- Formulaire d'ajout d'un nouveau capteur -->
    <h2>Ajouter un nouveau capteur</h2>
    <form action="{{ route('capteurs.store') }}" method="POST">
        @csrf
        <label for="nom">Nom du capteur :</label>
        <input type="text" name="nom" id="nom" required>
        <label for="type">Type du capteur :</label>
        <input type="text" name="type" id="type" required>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
