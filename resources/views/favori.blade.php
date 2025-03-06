@extends('layouts.headersFooter')

@section('content')
    
    <!-- Hero Section -->
    <section class="relative">
        <!-- Background Image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="https://www.villasmarrakech.com/photos/5108/marrakech-villa-rl-20078892425d88a17faf3748.77350493.1920.jpg" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="relative container mx-auto px-4 py-24 md:py-32 flex flex-col items-center text-center text-white">
            <!-- Main Title with Heart Icon -->
            <div class="flex items-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-rose-500 mr-3" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
                <h1 class="text-5xl md:text-6xl font-bold tracking-tight">Mes Favoris</h1>
            </div>
            
            <p class="text-xl md:text-2xl max-w-3xl mb-8">Retrouvez tous vos contenus préférés en un seul endroit, organisés et facilement accessibles à tout moment.</p>
            
            <!-- Search Bar -->
            <div class="w-full max-w-2xl flex items-center bg-white rounded-full shadow-lg overflow-hidden">
                <input type="text" placeholder="Rechercher dans vos favoris..." class="w-full px-6 py-4 outline-none text-gray-800" />
                <button class="bg-rose-500 hover:bg-rose-600 text-white px-6 py-4 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
            
            <!-- Stats -->
            <div class="flex flex-wrap justify-center gap-4 md:gap-16 mt-12">
                <div class="text-center">
                    <p class="text-4xl font-bold">258</p>
                    <p class="text-lg">Favoris</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold">42</p>
                    <p class="text-lg">Collections</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold">19</p>
                    <p class="text-lg">Catégories</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="container mx-auto px-4 py-8">
        <!-- Filtres rapides -->
        <div class="flex overflow-x-auto pb-4 mb-6 gap-2">
            <button class="px-4 py-2 bg-rose-500 text-white rounded-full whitespace-nowrap">Tous les favoris</button>
            <button class="px-4 py-2 bg-white border border-gray-200 rounded-full whitespace-nowrap hover:border-gray-800">Hôtels</button>
            <button class="px-4 py-2 bg-white border border-gray-200 rounded-full whitespace-nowrap hover:border-gray-800">Appartements</button>
            <button class="px-4 py-2 bg-white border border-gray-200 rounded-full whitespace-nowrap hover:border-gray-800">Maisons</button>
        </div>
        
        <!-- Properties Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
            <!-- Property Card avec syntaxe Blade préservée -->
            @foreach ($favoris as $propertie)
            <div class="bg-white rounded-lg shadow overflow-hidden hover:shadow-lg transition-shadow">
                <div class="relative">
                    <img src="{{ asset( 'storage/' . $propertie->image) }}" alt="Aperçu de la propriété" class="w-full h-48 object-cover">
                    
                </div>
            
                <div class="p-5">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-lg font-semibold">{{$propertie->titre}}</h3>
                            <p class="text-gray-500 text-sm">{{$propertie->adresse}}, {{$propertie->ville}}</p>
                        </div>
                        <div class="text-lg font-bold text-rose-600">{{$propertie->prix_par_nuit}} €<span class="text-xs text-gray-500">/nuit</span></div>
                    </div>
            
                    <div class="mt-3">
                        <p class="text-gray-600 text-sm line-clamp-2">{{$propertie->description}}</p>
                    </div>
            
                    <div class="mt-3 flex space-x-4 text-sm">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>{{$propertie->chambres}} chambres</span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>{{$propertie->salles_de_bain}} salle de bain</span>
                        </div>
                    </div>
            
                    <div class="mt-3">
                        <h4 class="font-medium text-sm mb-2">Équipements</h4>
                        <div class="flex flex-wrap gap-1">
                            @foreach ($propertie->equipments as $equipment)
                            <span class="px-2 py-1 bg-gray-100 rounded-full text-xs">{{$equipment->name}}</span>
                            @endforeach
                        </div>
                    </div>
            
                    <div class="mt-4 flex justify-end">
                        <form action="{{ route('reservation_show', ['id' => $propertie->id]) }}" method="POST">
                            @csrf
                            <button class="px-4 py-2  bg-rose-600 text-white rounded-md hover:bg-rose-700">
                                Réserver
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    @endsection