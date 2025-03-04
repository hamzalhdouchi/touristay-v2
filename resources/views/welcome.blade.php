<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur - Luxe Location</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-gradient-to-b from-red-600 to-red-800 text-white w-64 min-h-screen p-4">
            <div class="text-2xl font-bold mb-8 text-center">Luxe Location</div>
            <nav>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Tableau de bord
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    Utilisateurs
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Propriétés
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    Réservations
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    Rapports
                </a>
                <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-red-700 hover:text-white mb-1 flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Paramètres
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
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
                        {{-- <form action="{{ route('user.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="ml-4 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-red-600">
                                Déconnexion
                            </button>
                        </form> --}}
                        
                    </div>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 p-6">
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

              

                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-semibold mb-4">Utilisateurs</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Utilisateur</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telephone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">#{{$user->id}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$user->name}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$user->email}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$user->telephone}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($user->status === 'actif')
                                        <form action="{{route('user.changeStatus',$user->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" id="status" value="inactif">
                                            <button type="submit" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Actif
                                            </button>
                                        </form>
                                        @else
                                        <form action="{{route('user.changeStatus',$user->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" id="status" value="actif">
                                            <button type="submit" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                inactif
                                            </button>
                                        </form>
                                        @endif
                                       
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
                                    </form>
                                    </td>
                                </tr>
                                                       
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
    @include('alert');
    <script>
        // Reservations Chart
        var ctx = document.getElementById('reservationsChart').getContext('2d');
        var reservationsChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin'],
                datasets: [{
                    label: 'Réservations',
                    data: [65, 59, 80, 81, 56, 89],
                    borderColor: 'rgb(255, 99, 132)',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Properties Chart
        var ctx2 = document.getElementById('propertiesChart').getContext('2d');
        var propertiesChart = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Villa Paris', 'Appt. Nice', 'Chalet Alpes', 'Maison Bordeaux', 'Studio Lyon'],
                datasets: [{
                    label: 'Réservations',
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Toggle menu for mobile
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.querySelector('aside').classList.toggle('-translate-x-full');
        });
    </script>
</body>
</html>