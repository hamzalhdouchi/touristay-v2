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
            <nav>
           
                <a href="{{route('user.read')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Utilisateurs
                </a>
                <a href="{{route('properties.readAdmin')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Propriétés
                </a>
                <a href="{{route('reservationAd')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Réservations
                </a>
                <a href="{{route('payment.Admin')}}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    payment
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Paramètres
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            <!-- Header -->
            <div class="bg-white shadow">
                <div class="px-6 py-4 flex justify-between items-center">
                    <h1 class="text-2xl font-bold text-gray-800">Gestion des Propriétés</h1>
                    <div class="flex gap-4">

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
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">la date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($reservations as $reservation)
                            <tr>
                                <td class="px-6 py-4">#{{$reservation->id}}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="{{ asset('storage/' . $reservation->properties->image) }}" alt="Property" class="w-10 h-10 rounded-lg mr-3">

                                        <div>
                                            <div class="font-medium">{{$reservation->properties->titre}}</div>
                                        </div>
                                        <td class="px-6 py-4">{{$reservation->user->name}}</td>
                                        <td class="font-medium">{{$reservation->dataArrivée}}  • {{$reservation->dateDépart}} </td>
                                    </div>
                                </td>
                                <td class="px-6 py-4">{{$reservation->prix_Total}}</td>
                                
                               
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