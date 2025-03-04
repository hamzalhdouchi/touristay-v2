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
                <a href="{{route('user.read')}}" class="flex items-center px-4 py-3 hover:bg-red-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                    Tableau de bord
                </a>
                <a href="#" class="flex items-center px-4 py-3 bg-red-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Propriétés
                </a>
                <a href="#" class="flex items-center px-4 py-3 hover:bg-red-700">
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
           
             <header class="bg-white shadow-md py-4 px-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <button id="menu-toggle" class="text-gray-500 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <h1 class="text-xl font-bold text-gray-800 ml-4">Tableau de Bord</h1>
                    </div>
                    <div class="flex items-center">
                        <div class="relative">
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full" src="{{ asset('storage/' . Auth::user()->image) }}" alt="User avatar">
                            </button>
                        </div>
                        <span class="text-gray-600 ml-4">{{ Auth::user()->name }}</span>
                        <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-600">
                                Déconnexion
                            </button>
                        </form>
                        
                    </div>
                </div>
            </header>

            <!-- Stats Cards -->
            -- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-500 bg-opacity-75">
                            <svg class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold mb-2">Total Utilisateurs</h2>
                            <p class="text-3xl font-bold text-gray-800">1,234</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-500 font-semibold">+5.2%</span>
                        <span class="text-gray-500 text-sm ml-2">Depuis le dernier mois</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-500 bg-opacity-75">
                            <svg class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold mb-2">Propriétés Actives</h2>
                            <p class="text-3xl font-bold text-gray-800">567</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-500 font-semibold">+2.7%</span>
                        <span class="text-gray-500 text-sm ml-2">Depuis la semaine dernière</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-500 bg-opacity-75">
                            <svg class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold mb-2">Réservations du Mois</h2>
                            <p class="text-3xl font-bold text-gray-800">89</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-yellow-500 font-semibold">-1.3%</span>
                        <span class="text-gray-500 text-sm ml-2">Par rapport au mois dernier</span>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-500 bg-opacity-75">
                            <svg class="h-8 w-8 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h2 class="text-xl font-semibold mb-2">Revenu Mensuel</h2>
                            <p class="text-3xl font-bold text-gray-800">45,678 €</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span class="text-green-500 font-semibold">+8.1%</span>
                        <span class="text-gray-500 text-sm ml-2">Par rapport au mois dernier</span>
                    </div>
                </div>
            </div>

         
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
                                        <form action="{{route('propertie.destroyProperties' , $propertie->id)}}" method="post">
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

   
    @include('auth.alert');
    <script>
        function openModal() {
            document.getElementById("propertyModal").classList.remove("hidden");
        }
    
        function closeModal() {
            document.getElementById("propertyModal").classList.add("hidden");
        }
    </script>
    
</body>
</html>