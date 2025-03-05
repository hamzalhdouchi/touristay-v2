<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Location - Gestion des Propriétés</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-red-600 text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Luxe Location</h1>
            </div>
            <nav class="mt-8">
                <a href="#" class="flex items-center px-4 py-3 hover:bg-red-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Tableau de bord
                </a>
                <a href="{{route('properties.read')}}" class="flex items-center px-4 py-3 bg-red-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Propriétés
                </a>
                <a href="{{route('reservationAdmin')}}" class="flex items-center px-4 py-3 hover:bg-red-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Réservations
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <main class="flex-1 overflow-y-auto">
                <!-- Header -->
                <div class="bg-white shadow">
                    <div class="px-6 py-4 flex justify-between items-center">
                        <h1 class="text-2xl font-bold text-gray-800">Gestion des Propriétés</h1>
                        <div class="flex gap-4">
                            <!-- Bouton Ajouter une Propriété -->
                            <button onclick="openModal()" 
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Ajouter une Propriété
                            </button>
            
                            <!-- Notification Icon -->
                            <div class="relative">
                                <button class="text-gray-600 hover:text-gray-900" id="notificationButton" onclick="markNotificationsAsRead()">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 8a6 6 0 10-12 0 6 6 0 0012 0zM12 14l3-3m0 0l-3-3m3 3H6"></path>
                                    </svg>
                                </button>
                                <!-- Notification Badge -->
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="absolute top-0 right-0 inline-block w-4 h-4 bg-red-600 text-white text-xs rounded-full">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                                @endif
                            </div>
            
                            <!-- Bouton Gérer le Profil -->
                            <a href="{{ route('user.Profile') }}" 
                               class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                          d="M5.121 17.804A9.004 9.004 0 0112 3a9.004 9.004 0 016.879 14.804M15 21H9m6 0a3 3 0 00-6 0"/>
                                </svg>
                                Gérer le Profil
                            </a>
                        </div>
                    </div>
                </div>
            

            <!-- Stats Cards -->
            <div class="p-6 grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="bg-blue-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold">567</h3>
                            <p class="text-gray-500">Total Propriétés</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="bg-green-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold">486</h3>
                            <p class="text-gray-500">Propriétés Actives</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="bg-yellow-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold">81</h3>
                            <p class="text-gray-500">En Attente</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center">
                        <div class="bg-purple-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-2xl font-bold">45,678 €</h3>
                            <p class="text-gray-500">Revenu Mensuel</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Property List -->
            <div class="px-6">
                <div class="bg-white rounded-lg shadow">
                    <!-- Search and Filter -->
                    <div class="p-4 border-b flex justify-between items-center">
                        <div class="flex space-x-4">
                            <input type="text" 
                                   placeholder="Rechercher une propriété..." 
                                   class="border border-gray-300 rounded-lg px-4 py-2 w-64">
                            <select class="border border-gray-300 rounded-lg px-4 py-2">
                                <option>Tous les types</option>
                                <option>Appartement</option>
                                <option>Maison</option>
                                <option>Villa</option>
                            </select>
                            <select class="border border-gray-300 rounded-lg px-4 py-2">
                                <option>Tous les statuts</option>
                                <option>Actif</option>
                                <option>En attente</option>
                                <option>Inactif</option>
                            </select>
                        </div>
                    </div>

                    <!-- Table -->
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Propriété</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Adresse</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix/Nuit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($properties as $propertie)
                            <tr>
                                <td class="px-6 py-4">#{{$propertie->id}}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/' . $propertie->image) }}" alt="Property" class="w-10 h-10 rounded-lg mr-3">

                                        <div>
                                            <div class="font-medium">{{$propertie->titre}}</div>
                                            <div class="text-sm text-gray-500">{{$propertie->chambres}} chambres • {{$propertie->salles_de_bain}} SDB</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">{{$propertie->adresse}}</td>
                                <td class="px-6 py-4">{{$propertie->ville}}</td>
                                <td class="px-6 py-4">{{$propertie->prix_par_nuit}} €</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                        Actif
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex space-x-2">
                                        <form action="{{ route('propertie.modifer', $propertie->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="text-blue-600 hover:text-blue-900">Modifier</button>
                                        </form>
                                        <form action="{{route('propertie.destroy' , $propertie->id)}}" method="post">
                                            @csrf
                                            @method('DELETE');
                                            <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!-- Add more property rows here -->
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="px-6 py-4 flex items-center justify-between border-t">
                        {{-- {{ $propertie->links() }} --}}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="propertyModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 hidden">
        <div class="container  mx-auto p-6">
            <!-- Titre de la page -->
           
    
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 ">
                <!-- Formulaire d'ajout -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Informations de la Propriété</h2>
                    <form class="space-y-4" action="{{ route('properties.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Informations de base -->
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titre de la propriété</label>
                            <input type="text" name="titre" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Villa avec vue sur mer">
                        </div>
                    
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description" class="w-full border border-gray-300 rounded-md px-3 py-2 h-24" placeholder="Description détaillée de la propriété..."></textarea>
                        </div>
                    
                        <!-- Prix et détails -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Prix par nuit (€)</label>
                                <input type="number" name="prix_par_nuit" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="150">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Caution (€)</label>
                                <input type="number" name="caution" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="500">
                            </div>
                        </div>
                    
                        <!-- Caractéristiques -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Chambres</label>
                                <input type="number" name="chambres" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Salles de bain</label>
                                <input type="number" name="salles_de_bain" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="1">
                            </div>
                        </div>
                    
                        <!-- Date -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Date de disponibilite</label>
                            <input type="date" name="disponibilite" class="w-full border border-gray-300 rounded-md px-3 py-2">
                        </div>
                    
                        <!-- Adresse -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                            <input type="text" name="adresse" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2" placeholder="Numéro et rue">
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" name="ville" class="border border-gray-300 rounded-md px-3 py-2" placeholder="Ville">
                                <input type="number" name="code_postal" class="border border-gray-300 rounded-md px-3 py-2" placeholder="Code postal">
                            </div>
                        </div>
                    
                        <!-- Équipements -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Équipements</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($équipements as $equipment)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="equipments[]" value="{{ $equipment->id }}" class="rounded text-red-600">
                                        <span> {{ $equipment->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    
                        <!-- Photos -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Photos</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-md p-4 text-center">
                                <input type="file" name="image" class="hidden" id="photos">
                                <label for="photos" class="cursor-pointer text-red-600 hover:text-red-800">
                                    Cliquez pour ajouter des photos
                                </label>
                            </div>
                        </div>
                    
                        <!-- Boutons -->
                        <div class="flex justify-end space-x-3">
                            <button type="button" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50">
                                Annuler
                            </button>
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                Enregistrer la propriété
                            </button>
                        </div>
                    </form>
                    
                </div>

            </div>
        </div>
    </div>
    @include('auth.alert');
    <script>
        function openModal() {
            document.getElementById("propertyModal").classList.remove("hidden");
        }

    document.getElementById('notificationButton').addEventListener('click', function() {
    const dropdown = document.querySelector('.notification-dropdown');
    dropdown.classList.toggle('hidden');
        });
    
        function closeModal() {
            document.getElementById("propertyModal").classList.add("hidden");
        }
    </script>
    
</body>
</html>