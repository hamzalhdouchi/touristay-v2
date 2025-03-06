@extends('layouts.headersFooter')

@section('content')
<main class="container mx-auto px-4 max-w-full py-6">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 overflow-hidden mb-8 rounded-xl">
        <!-- Hero Background with Overlay -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1600&q=80"
                alt="Beautiful vacation destinations" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black opacity-40"></div>
        </div>

        <!-- Hero Content -->
        <div
            class="relative max-w-7xl mx-auto px-4 py-24 sm:py-32 sm:px-6 lg:px-8 flex flex-col items-center text-center">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl mb-6">
                Trouvez votre prochain séjour de rêve
            </h1>
            <p class="mt-6 text-xl text-white max-w-3xl">
                Découvrez des logements uniques et vivez des expériences authentiques partout dans le monde.
            </p>

            <!-- Search Form -->
            <div class="w-full max-w-3xl mt-10">
                <div class="relative mb-8">
                    <form method="GET" action="{{ route('properties.dynamicSearch') }}"
                        class="flex items-center justify-between bg-white rounded-full border border-gray-300 shadow-lg hover:shadow-xl transition-shadow">
                        <div class="flex-grow flex items-center">
                            <div class="py-3 px-8">
                                <div class="text-sm font-medium">Destination</div>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Où souhaitez-vous aller ?" class="w-full outline-none text-gray-600">
                            </div>
                        </div>
                        <button
                            class="bg-airbnb hover:bg-airbnb-dark text-white p-4 m-2 rounded-full flex items-center justify-center transition-colors">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="ml-2 font-medium">Rechercher</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Popular Destinations -->
            <div class="mt-12">
                <div class="text-white text-lg font-medium mb-4">Destinations populaires</div>
                <div class="flex flex-wrap justify-center gap-3">
                    <button
                        class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-sm rounded-full text-white transition">Paris</button>
                    <button
                        class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-sm rounded-full text-white transition">Nice</button>
                    <button
                        class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-sm rounded-full text-white transition">Marseille</button>
                    <button
                        class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-sm rounded-full text-white transition">Lyon</button>
                    <button
                        class="px-4 py-2 bg-white bg-opacity-20 hover:bg-opacity-30 backdrop-blur-sm rounded-full text-white transition">Bordeaux</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="overflow-x-auto pb-4 mb-8">
        <form action="{{ route('readAll.properties') }}" method="GET">
            @csrf
            <label for="pagination" class="text-sm font-medium">Afficher par :</label>
            <select name="perPage" id="pagination"
                class="px-4 py-2 text-sm rounded-full border border-gray-300 transition-colors"
                onchange="this.form.submit()">
                <option value="2" {{ request('perPage') == '2' ? 'selected' : '' }}>5 éléments</option>
                <option value="10" {{ request('perPage') == '10' ? 'selected' : '' }}>10 éléments</option>
                <option value="15" {{ request('perPage') == '15' ? 'selected' : '' }}>15 éléments</option>
            </select>
        </form>
    </div>

    <!-- Properties Grid -->
    <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
        <!-- Property Card 1 -->
        @foreach ($properties as $propertie)
            <div class="bg-white rounded-lg shadow overflow-hidden relative">
                <img src="{{ asset('storage/' . $propertie->image) }}" alt="Aperçu de la propriété"
                    class="w-full h-64 object-cover">
                @if ($favoris->contains($propertie->id))
                    <form action="{{ route('favore.remove', $propertie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="absolute top-2 right-2 bg-white text-red-600 rounded-full p-4 hover:text-red-700">
                        </form>
                @else
                    <form action="{{ route('favore.create', $propertie->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="absolute top-2 right-2 bg-white text-gray-600 rounded-full p-4 hover:gray-red-700">
                    </form>
                @endif
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z">
                    </path>
                </svg>
                </button>

                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-semibold">{{ $propertie->titre }}</h3>
                            <p class="text-gray-500">{{ $propertie->adresse }}, {{ $propertie->ville }}</p>
                        </div>
                        <div class="text-2xl font-bold text-red-600">{{ $propertie->prix_par_nuit }} €<span
                                class="text-sm text-gray-500">/nuit</span></div>
                    </div>

                    <div class="mt-4">
                        <p class="text-gray-600">{{ $propertie->description }}</p>
                    </div>

                    <div class="mt-4 flex space-x-4">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span>{{ $propertie->chambres }} chambres</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-1" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>{{ $propertie->salles_de_bain }} salle de bain</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-medium mb-2">Équipements</h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($propertie->equipments as $equipment)
                                <span
                                    class="px-2 py-1 bg-gray-100 rounded-full text-sm">{{ $equipment->name }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <form action="{{ route('reservation_show', ['id' => $propertie->id]) }}" method="POST">
                            @csrf
                            <button class="px-4 py-2 bg-rose-600 text-white rounded-md hover:bg-rose-700">
                                Réserver
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-10 flex justify-center">
        <div class="bg-white rounded-lg shadow-sm p-2 inline-flex">
            {{ $properties->links() }}
        </div>
    </div>
</main>
@include('auth.alert')
@endsection
