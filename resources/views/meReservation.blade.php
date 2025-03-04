<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Réservations - Airbnb</title>
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
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <!-- Header (Similar to Previous Page) -->
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
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 overflow-hidden mb-8">
        <div class="relative max-w-7xl mx-auto px-4 py-16 sm:py-24 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl mb-4">
                Mes Réservations
            </h1>
            <p class="mt-4 text-xl text-white max-w-3xl mx-auto">
                Retrouvez tous vos séjours à venir et gérez vos réservations
            </p>
        </div>
    </div>

    <!-- Reservations Container -->
    <main class="container mx-auto px-4 max-w-4xl py-8">
        <!-- Reservation Cards -->
        @forelse ($reservations as $reservation)
        <div class="bg-white rounded-lg shadow-md mb-6 overflow-hidden">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">{{ $reservation->properties->titre }}</h2>
                        <p class="text-gray-600">{{ $reservation->properties->adresse }}, {{ $reservation->properties->ville }}</p>
                    </div>
                    <div class="text-right">
                        <span class="text-2xl font-bold text-airbnb">{{ $reservation->prix_Total}} €</span>
                        <p class="text-sm text-gray-500">Prix total</p>
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <h3 class="font-semibold text-gray-700">Dates du séjour</h3>
                        <div class="flex items-center space-x-2 text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{ $reservation->dataArrivée }} - {{ $reservation->dateDépart }}</span>
                        </div>
                    </div>
                   
                </div>

                <div class="flex space-x-4 mt-6">
                    <form action="{{ route('reservation.cancel', $reservation->id) }}" method="POST" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2 px-4 border border-airbnb text-airbnb rounded-md hover:bg-red-50 transition">
                            Annuler la réservation
                        </button>
                    </form>
                    <form action="{{ route('Pay', ) }}" method="POST" class="w-full">
                        @csrf
                        <input type="hidden" name="amount" value="{{$reservation->prix_Total}}">
                        <button type="submit" class="w-full py-2 px-4 bg-airbnb text-white rounded-md hover:bg-airbnb-dark transition">
                            Procéder au paiement
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-12 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Aucune réservation en cours</h2>
            <p class="text-gray-500 mb-6">Vous n'avez pas encore de réservations. Explorez nos offres !</p>
            <a href="{{ route('readAll.properties') }}" class="inline-block px-6 py-3 bg-airbnb text-white rounded-md hover:bg-airbnb-dark transition">
                Découvrir des logements
            </a>
        </div>
        @endforelse

        @include('auth.alert');
    </main>
</body>
</html>