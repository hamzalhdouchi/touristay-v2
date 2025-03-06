<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Location</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'airbnb': '#FF385C',
                        'airbnb-dark': '#E00B41',
                    }
                }
            }
        }
    </script>
    <!-- Ajoute ici d'autres liens ou scripts -->
</head>
<body class="font-inter">

    <!-- Le header de la page -->
    <header class="sticky top-0 z-50 bg-white border-b border-gray-200">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <svg class="h-8 w-8 text-airbnb" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C14.5 2 16.5 4 16.5 6.5C16.5 9 15 11 13 13C12.5 13.5 12 13.5 11.5 13C9.5 11 8 9 8 6.5C8 4 10 2 12 2M12 0C9 0 6 2.5 6 6.5C6 10 8 12.5 10.5 15C11 15.5 12 16 12.5 15.5C15 13 17 10.5 17 6.5C17 2.5 15 0 12 0Z" />
                    </svg>
                    <span class="ml-2 text-airbnb font-bold text-xl">airbnb</span>
                </div>
                <nav class="hidden md:flex space-x-6">
                    <a href="{{route('readAll.properties')}}" class="font-medium ">Accueil</a>
                    <a href="{{route('meReservation')}}" class="font-medium">Me Reservation</a>
                    <a href="{{route('favoris.index')}}" class="font-medium">Favoris</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <button class="py-2 px-4 text-sm font-medium rounded-full hover:bg-gray-100">Mettre mon logement sur Airbnb</button>
                    <button class="p-2 rounded-full hover:bg-gray-100">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10a1 1 0 011-1h4a1 1 0 011 1v4a1 1 0 01-1 1h-4a1 1 0 01-1-1v-4z"></path>
                        </svg>
                    </button>
                    <div class="flex items-center border border-gray-300 rounded-full p-2 space-x-2 hover:shadow-md transition-shadow">
                        <svg class="h-5 w-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <a href="{{route('user.Profile')}}">
                            <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Contenu dynamique -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 mt-12">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-semibold text-gray-800 mb-4">À propos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Fonctionnement de Luxe Location</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Newsroom</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Investisseurs</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-4">Communauté</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Diversité et intégration</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Accessibilité</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Partenaires</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-4">Hôte</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Devenir hôte</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Ressources pour les hôtes</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Forum de la communauté</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-semibold text-gray-800 mb-4">Assistance</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Centre d'aide</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Service de sécurité</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-airbnb">Options d'annulation</a></li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-200 text-center text-gray-500">
                <p>&copy; 2023 Luxe Location. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

</body>
</html>
