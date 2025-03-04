<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la propriété</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="text-rose-500 font-bold text-2xl">airlogis</div>
                </div>
                <div class="flex items-center">
                    <button class="rounded-full p-2 border border-gray-200 flex items-center space-x-2 hover:shadow-md transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <div class="rounded-full bg-gray-500 text-white h-8 w-8 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Property Image - Single Image -->
        <div class="relative">
            <div class="rounded-xl overflow-hidden">
                <img src="{{asset('storage/',$propertie->image)}}" alt="Aperçu de la propriété" class="w-full h-96 object-cover" />
            </div>
            <button class="absolute top-4 right-4 bg-white rounded-full p-2 shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                </svg>
            </button>
        </div>

        <!-- Property Info -->
        <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <div class="border-b pb-6">
                    <h1 class="text-2xl font-bold">{{$propertie->titre}}</h1>
                    <p class="text-gray-600 mt-1">{{$propertie->description}}</p>
                    
                </div>

                <div class="py-6 border-b">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="bg-gray-200 rounded-full h-14 w-14 flex items-center justify-center">
                               <img src="{{$propertie->user->image}}" alt="">
                            </div>
                        </div>
                        <div>
                            <h2 class="text-lg font-medium">Logement proposé par Hôte</h2>
                            <p class="text-gray-500">{{$propertie->chambres}} chambres · {{$propertie->salles_de_bain}} salles de bain</p>
                        </div>
                    </div>
                </div>

                <div class="py-6 border-b">
                    <div class="space-y-4">
                        <div class="flex items-start space-x-4">
                            <div class="mt-1 text-rose-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </div>
                          
                        </div>
                       
                    </div>
                </div>

                <div class="py-6 border-b">
                    <h2 class="text-xl font-bold mb-4">Équipements</h2>
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        <span>Parking</span>
                    </div>
                    
                    <button class="mt-6 border border-gray-900 rounded-lg px-6 py-2 font-medium hover:bg-gray-100 transition">
                        Voir les détails
                    </button>
                </div>
            </div>

            <!-- Booking Card -->
            <div class="lg:col-span-1">
                <div class="sticky top-24 border rounded-xl shadow-lg p-6 bg-white">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="text-xl font-bold">{{$propertie->prix_par_nuit}} €</span>
                            <span class="text-gray-500">/nuit</span>
                        </div>
                        <div class="flex items-center space-x-1 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="mt-4 border rounded-t-lg">
                        <div class="grid grid-cols-2">
                            <div class="p-3 border-r border-b">
                                <div class="text-xs font-bold">ARRIVÉE</div>
                                <div>15/03/2025</div>
                            </div>
                            <div class="p-3 border-b">
                                <div class="text-xs font-bold">DÉPART</div>
                                <div>20/03/2025</div>
                            </div>
                        </div>
                        <div class="p-3 border-b">
                            <div class="flex justify-between">
                                <div class="text-xs font-bold">VOYAGEURS</div>
                                <div class="text-gray-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                            <div>2 voyageurs</div>
                        </div>
                    </div>
                    
                    <button  class="mt-4 w-full bg-rose-500 text-white font-bold py-3 rounded-lg hover:bg-rose-600 transition">
                        Réserver
                    </button>
                    <p class="mt-2 text-center text-sm text-gray-500">Aucun montant ne vous sera débité pour le moment</p>
                    
                    <div class="mt-4 space-y-3">
                        <div class="pt-3 border-t flex justify-between font-bold">
                            <div>Total</div>
                            <div>627 €</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="mt-12 border-t pt-8">
            <h2 class="text-xl font-bold mb-4">Où vous serez</h2>
            <div class="h-96 bg-gray-200 rounded-xl flex items-center justify-center">
                <div class="text-gray-500">Carte de localisation</div>
            </div>
            <p class="mt-4 text-gray-600">Quartier calme et résidentiel proche des transports en commun et des commerces.</p>
        </div>
    </main>
    
    <footer class="bg-gray-100 mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border-b pb-8 grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="font-bold mb-4">Assistance</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Centre d'aide</a></li>
                        <li><a href="#" class="hover:underline">Informations de sécurité</a></li>
                        <li><a href="#" class="hover:underline">Options d'annulation</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Communauté</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Forum</a></li>
                        <li><a href="#" class="hover:underline">Partenaires</a></li>
                        <li><a href="#" class="hover:underline">Inviter des amis</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">Accueil</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Devenir hôte</a></li>
                        <li><a href="#" class="hover:underline">Ressources</a></li>
                        <li><a href="#" class="hover:underline">Responsabilité</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="font-bold mb-4">À propos</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Newsroom</a></li>
                        <li><a href="#" class="hover:underline">Investisseurs</a></li>
                        <li><a href="#" class="hover:underline">Carrières</a></li>
                    </ul>
                </div>
            </div>
            <div class="pt-8 flex flex-col md:flex-row justify-between">
                <div class="flex flex-col md:flex-row md:space-x-4 space-y-2 md:space-y-0 text-sm">
                    <span>© 2025 Airlogis, Inc.</span>
                    <a href="#" class="hover:underline">Confidentialité</a>
                    <a href="#" class="hover:underline">Conditions générales</a>
                    <a href="#" class="hover:underline">Plan du site</a>
                </div>
                <div class="mt-4 md:mt-0 flex items-center space-x-6">
                    <span class="text-sm font-medium">Français (FR)</span>
                    <span class="text-sm font-medium">€ EUR</span>
                </div>
            </div>
        </div>
    </footer>

   
    
    <script>
        // function openLightbox() {
        //     ('[data-fancybox="gallery"]').fancybox({
        //         loop: true, 
        //         buttons: [
        //             "zoom",
        //             "share",
        //             "slideShow",
        //             "fullScreen",
        //             "download",
        //             "thumbs",
        //             "close"
        //         ],
        //         animationEffect: "fade", 
        //         transitionEffect: "fade", 
        //         transitionDuration: 300, 
        //         slideShow: {
        //             autoStart: false,
        //             speed: 2000
        //         },
        //         thumbs: {
        //             autoStart: true 
        //         }
        //     });
        // }
    
        // document.addEventListener('DOMContentLoaded', function() {
        //     openLightbox();
            
        // });
    
        function confirmDelete(id) {
            const modal = document.getElementById('deleteModal');
            const deleteForm = document.getElementById('deleteForm');
            const cancelDelete = document.getElementById('cancelDelete');
            
            deleteForm.action = `/properties/${id}/`;
            
            modal.classList.remove('hidden');
            
            cancelDelete.onclick = function() {
                modal.classList.add('hidden');
            }
            
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.classList.add('hidden');
                }
            }
        }
        function calculatePrice()
        {
            let x = $("input[name='daterange']").val();
            x = x.split(" - ");
            a = moment().format(x[1]);
            b = moment().format(x[0]);
            let numberOfNights  = moment(a).diff(moment(b),'days');
            $("#nightsCount").html(numberOfNights);
            let unitPrice =  $("#perNightPrice").attr("data-price");
            var price = numberOfNights * unitPrice;
            $('#subtotal').html(price + "€");
            $('#total').html(price + "€");
            $('#totalAmount').val(price);
        }
        
        function openBookingModal() {
            document.getElementById('bookingModal').classList.remove('hidden');
        }
        
        function closeBookingModal() {
            document.getElementById('bookingModal').classList.add('hidden');
        }
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
            minDate: "{{Carbon\Carbon::now()->format("m/d/Y")}}",
            maxDate: "{{Carbon\Carbon::parse($listing->enddate)->format("m/d/Y")}}",
        });
    </script>
</body>
</html>