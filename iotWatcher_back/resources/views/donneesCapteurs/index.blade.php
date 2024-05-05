<!-- resources/views/capteurs/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Liste des capteurs</title>
</head>
<body>
    <div class="container">
        <h1>Liste des données de capteurs</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Capteur</th>
                    <th scope="col">Valeur</th>
                    <th scope="col">Timestamp</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donneesCapteurs as $donneesCapteur)
                    <tr>
                        <th scope="row">{{ $donneesCapteur->id }}</th>
                        <td>{{ $donneesCapteur->capteur_id }}</td>
                        <td>{{ $donneesCapteur->valeur }}</td>
                        <td>{{ $donneesCapteur->timestamp }}</td>
                        <td>
                            <form action="{{ route('donneesCapteurs.destroy', $donneesCapteur->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
