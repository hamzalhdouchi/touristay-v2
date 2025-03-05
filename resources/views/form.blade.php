<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
    <div id="propertyModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 ">
        <div class="container  mx-auto p-6">
            <!-- Titre de la page -->
           
    
            <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 ">
                <!-- Formulaire d'ajout -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-xl font-semibold mb-4">Informations de la Propriété {{ $errors->first() }}</h2>
                    <form class="space-y-4" 
                    action="{{ route('update.properties', $propertie->id) }}" 
                    method="POST" 
                    enctype="multipart/form-data">
                  @method('PATCH') 
                        @csrf
                        <!-- Informations de base -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Titre de la propriété</label>
                            <input type="text" name="titre" value="{{$propertie->titre}}" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="Villa avec vue sur mer">
                        </div>
    
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                            <textarea name="description"  class="w-full border border-gray-300 rounded-md px-3 py-2 h-24" placeholder="Description détaillée de la propriété...">{{$propertie->description}}</textarea>
                        </div>
    
                        <!-- Prix et détails -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Prix par nuit (€)</label>
                                <input type="number" name="prix_par_nuit" value="{{$propertie->prix_par_nuit}}" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="150">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Caution (€)</label>
                                <input type="number" value="{{$propertie->caution}}" name="caution" class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="500">
                            </div>
                        </div>
    
                        <!-- Caractéristiques -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Chambres</label>
                                <input type="number" name="chambres" {{$propertie->chambres}} class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Salles de bain</label>
                                <input type="number" name="salles_de_bain" {{$propertie->salles_de_bain}} class="w-full border border-gray-300 rounded-md px-3 py-2" placeholder="1">
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
                            <input type="text" name="adresse" value="adresse" class="w-full border border-gray-300 rounded-md px-3 py-2 mb-2" placeholder="Numéro et rue">
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" name="ville" value="ville" class="border border-gray-300 rounded-md px-3 py-2" placeholder="Ville">
                                <input type="number" value="code_postal" name="code_postal" class="border border-gray-300 rounded-md px-3 py-2" placeholder="Code postal">
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
</body>
</html>