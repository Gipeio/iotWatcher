<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('CapteurNotifications') }}</div>

                    <div class="card-body">
                        <!-- Afficher les notifications -->
                        @foreach ($capteurNotifications as $capteurNotification)
                            <div class="notification">
                                <p>{{ $capteurNotification->message }}</p>
                                <small>{{ $capteurNotification->created_at->diffForHumans() }}</small>
                                <!-- Formulaire pour marquer la notification comme lue -->
                                <form action="{{ route('capteurNotifications.markAsRead', $capteurNotification->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-link">Marquer comme lue</button>
                                </form>
                                <!-- Formulaire pour supprimer la notification -->
                                <form action="{{ route('capteurNotifications.destroy', $capteurNotification->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link">Supprimer</button>
                                </form>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
