<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion du Profil - Luxe Location</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        airbnb: '#FF5A5F',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    <header class="bg-white shadow-sm">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            <div class="text-airbnb font-bold text-2xl">Luxe Location</div>
            <div class="flex items-center space-x-4">
                <button class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </button>
                <button class="bg-airbnb text-white px-4 py-2 rounded-full hover:bg-red-600 transition duration-200">
                    Menu
                </button>
            </div>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Gestion du Profil</h1>

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Informations personnelles</h2>
            <form action="{{ route('user.changeProfile', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- User Information -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Prénom</label>
                        <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-airbnb">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Adresse e-mail</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-airbnb">
                    </div>
                    <div>
                        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">Numéro de téléphone</label>
                        <input type="tel" id="telephone" name="telephone" value="{{ $user->telephone }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-airbnb">
                    </div>
                </div>
            
                <!-- Adresse -->
                <div class="mt-6">
                    <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">Adresse</label>
                    <input id="adresse" name="adresse" type="text" value="{{ $user->adresse }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-airbnb">
                </div>
            
                <!-- Profile Image -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Photo de profil</h2>
                    <div class="flex items-center space-x-6">
                        <img src="{{ asset('storage/' . $user->image) }}" alt="Photo de profil" class="w-32 h-32 rounded-full">
                        <div>
                            <input type="file" name="image" class="bg-white text-airbnb px-4 py-2 border border-airbnb rounded-md hover:bg-airbnb hover:text-white transition duration-200">
                            <p class="text-sm text-gray-500 mt-2">JPG, GIF ou PNG. Taille max. 5 Mo.</p>
                        </div>
                    </div>
                </div>
            
                <!-- Submit button for the form -->
                <div class="mt-6">
                    <button type="submit" class="bg-airbnb text-white px-6 py-2 rounded-md hover:bg-red-600 transition duration-200">Enregistrer les modifications</button>
                </div>
            </form>
            
        </div>

       

        <div class="bg-white rounded-lg shadow-md p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Préférences de communication</h2>
            <div class="space-y-4">
                <div class="flex items-center">
                    <input type="checkbox" id="emailNotif" name="emailNotif" class="h-4 w-4 text-airbnb focus:ring-airbnb border-gray-300 rounded">
                    <label for="emailNotif" class="ml-2 block text-sm text-gray-700">Recevoir des notifications par e-mail</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="smsNotif" name="smsNotif" class="h-4 w-4 text-airbnb focus:ring-airbnb border-gray-300 rounded">
                    <label for="smsNotif" class="ml-2 block text-sm text-gray-700">Recevoir des notifications par SMS</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="marketingEmails" name="marketingEmails" class="h-4 w-4 text-airbnb focus:ring-airbnb border-gray-300 rounded">
                    <label for="marketingEmails" class="ml-2 block text-sm text-gray-700">Recevoir des e-mails marketing</label>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Sécurité du compte</h2>
            <div class="space-y-4">
                <button class="text-airbnb hover:underline">Modifier le mot de passe</button>
                <button class="text-airbnb hover:underline">Activer l'authentification à deux facteurs</button>
                <button class="text-airbnb hover:underline">Gérer les appareils connectés</button>
            </div>
        </div>
    </main>

 
    @include('auth.alert');
</body>
</html>