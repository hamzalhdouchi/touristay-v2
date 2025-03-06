@extends('layouts.headersFooter')

@section('content')

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 overflow-hidden mb-8 rounded-xl h-[50vh]">
        <!-- Hero Background with Image -->
        <div class="absolute inset-0">
            <img src="https://www.marrakech-private-resort.com/wp-content/uploads/2018/03/MPR-VillaDar78surGolf-01.jpg"
                alt="Beautiful vacation destinations" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black opacity-40"></div> <!-- Overlay -->
        </div>
    
        <!-- Hero Content -->
        <div class="relative max-w-7xl mx-auto px-4 py-16 sm:py-24 sm:px-6 lg:px-8 text-center text-white">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl mb-4">
                Mes Réservations
            </h1>
            <p class="mt-4 text-xl max-w-3xl mx-auto">
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
    @endsection