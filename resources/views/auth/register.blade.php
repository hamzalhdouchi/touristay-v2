<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification - Style Airbnb</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-2xl shadow-lg max-w-md w-full">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Bienvenue</h2>
            
            <!-- Onglets -->
            <div class="flex mb-6">
                <form action="{{route('login')}}" method="get">
                    <button id="loginTab" class="flex-1 py-2 px-4 text-center text-gray-500 font-medium">Se connecter</button>
                </form>
                <form action="{{route('inscrer')}}" method="get">
                    <button id="signupTab" class="flex-1 py-2 px-4 text-center border-b-2 border-red-500 text-red-500 font-medium">S'inscrire</button>
                </form>
            </div>
            
            
            <!-- Formulaire d'inscription -->
            <form action="{{ route('register') }}" method="POST" id="signupForm"  enctype="multipart/form-data">
                @csrf
            
                <!-- Nom complet -->
                <div class="mb-6">
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Nom complet</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300" placeholder="Votre nom" required>
                </div>
            
                <!-- Adresse e-mail -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Adresse e-mail</label>
                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300" placeholder="vous@exemple.com" required>
                </div>
            
                <!-- Numéro de téléphone -->
                <div class="mb-6">
                    <label for="telephone" class="block text-gray-700 text-sm font-semibold mb-2">Numéro de téléphone</label>
                    <input type="tel" id="telephone" name="telephone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300" placeholder="Votre numéro de téléphone" required>
                </div>
            
                <!-- Mot de passe -->
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300" placeholder="Créez un mot de passe" required>
                </div>
            
                <!-- Confirmation du mot de passe -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-semibold mb-2">Confirmer le mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300" placeholder="Confirmez votre mot de passe" required>
                </div>
            
                <!-- Sélection du rôle -->
                <div class="mb-6">
                    <label for="role_id" class="block text-gray-700 text-sm font-semibold mb-2">Type d'utilisateur</label>
                    <select id="role_id" name="role_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300">
                        <option value="1">Client</option>
                        <option value="2">Messoner</option>
                    </select>
                </div>
            
                <!-- Image de profil -->
                <div class="mb-6">
                    <label for="image" class="block text-gray-700 text-sm font-semibold mb-2">Image de profil</label>
                    
                    <!-- Conteneur d'image avec aperçu intégré -->
                    <label for="image" class="cursor-pointer w-32 h-32 bg-gray-200 border-2 border-gray-300 rounded-full flex items-center justify-center hover:bg-gray-300 transition duration-300 relative overflow-hidden">
                        <span class="text-gray-500 text-sm" id="uploadText">Choisir une image</span>
                        <input type="file" id="image" name="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                        <!-- Aperçu de l'image -->
                        <img id="imagePreview" class="w-full h-full object-cover absolute inset-0" src="" alt="Image de profil" style="display: none;">
                    </label>
                    <p class="mt-2 text-xs text-gray-500">Formats acceptés: .jpg, .jpeg, .png, .gif</p>
                </div>
            
                <!-- Bouton de soumission -->
                <button type="submit" class="w-full bg-gradient-to-r from-red-600 to-red-400 text-white font-bold py-2 px-4 rounded-md hover:from-red-700 hover:to-red-500 transition duration-300">
                    S'inscrire
                </button>
            </form>
            
           
            <div id="forgotPassword" class="mt-4 text-center">
                <a href="#" class="text-sm text-gray-600 hover:underline">Mot de passe oublié ?</a>
            </div>
            
            <div class="mt-6 flex items-center justify-between">
                <hr class="w-full border-gray-300">
                <span class="px-2 text-gray-500 bg-white">ou</span>
                <hr class="w-full border-gray-300">
            </div>
            
            <div class="mt-6">
                <button class="w-full border border-gray-300 text-gray-700 font-medium py-2 px-4 rounded-md hover:bg-gray-50 transition duration-300 flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                    </svg>
                    Continuer avec Google
                </button>
            </div>
        </div>
    </div>
    @include('auth.alert')


    <script>
        const loginTab = document.getElementById('loginTab');
        const signupTab = document.getElementById('signupTab');
        const loginForm = document.getElementById('loginForm');
        const signupForm = document.getElementById('signupForm');
        const forgotPassword = document.getElementById('forgotPassword');

        loginTab.addEventListener('click', () => {
            loginTab.classList.add('border-b-2', 'border-red-500', 'text-red-500');
            signupTab.classList.remove('border-b-2', 'border-red-500', 'text-red-500');
            loginForm.classList.remove('hidden');
            signupForm.classList.add('hidden');
            forgotPassword.classList.remove('hidden');
        });

        signupTab.addEventListener('click', () => {
            signupTab.classList.add('border-b-2', 'border-red-500', 'text-red-500');
            loginTab.classList.remove('border-b-2', 'border-red-500', 'text-red-500');
            signupForm.classList.remove('hidden');
            loginForm.classList.add('hidden');
            forgotPassword.classList.add('hidden');
        });
        function previewImage(event) {
                    const reader = new FileReader();
                    reader.onload = function() {
                        const output = document.getElementById('imagePreview');
                        output.src = reader.result;
                        output.style.display = 'block';
                    }
                    reader.readAsDataURL(event.target.files[0]);
                }
    </script>
</body>
</html>