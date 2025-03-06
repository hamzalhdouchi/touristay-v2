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
<body>
    <div id="bookingModal" class=" fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full flex items-center justify-center z-50">
        <div class="relative mx-auto p-5 border w-full max-w-lg shadow-lg rounded-md bg-white">
            <button type="button" class="absolute top-3 right-3 text-gray-400 hover:text-gray-500" onclick="closeBookingModal()">
                <i class="fas fa-times"></i>
            </button>
            
            <div class="mt-3">
                <h3 class="text-lg font-medium text-gray-900 text-center mb-4">Réserver {{ $propertie->titre }}</h3>
                
                <form id="bookingForm" method="POST" action="{{ route('reservation', $propertie->id) }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                
                    <!-- Date selection -->
                    <div class="mb-4">
                        <label for="daterange" class="block text-gray-700 text-sm font-bold mb-2">Date de réservation</label>
                        <input 
                        onchange="calculatePrice()" 
                        type="text" 
                        id="daterange" 
                        class="block text-gray-700 text-sm font-bold mb-2 @error('daterange') border-red-500 @enderror" 
                        name="daterange" 
                        value="{{ \Carbon\Carbon::now()->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($propertie->disponibilite)->format('d/m/Y') }}" 
                    />
                        @error('daterange')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <!-- Price summary -->
                    <div class="p-4 bg-gray-50 rounded-md mb-4">
                        <div class="flex justify-between mb-2">
                            <span data-price="{{$propertie->prix_par_nuit}}" id="perNightPrice">{{ $propertie->prix_par_nuit }}€ x <span id="nightsCount">0</span> nuits</span>
                            <span id="subtotal">0€</span>
                        </div>
                        <div class="border-t pt-2 font-bold flex justify-between">
                            <span>Total</span>
                            <span id="total">0€</span>
                            <input type="hidden" id="totalAmount" name="prix_Total" value="0">
                        </div>
                    </div>
                
                    <div>
                        <button type="submit" class="w-full bg-rose-500 text-white px-4 py-2 rounded-md font-medium hover:bg-rose-700 transition">
                            Procéder au paiement
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
    <script>
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

        let reservationDates = [
        @foreach($reservations as $reservation)
            ["{{ Carbon\Carbon::parse($reservation->dataArrivée)->format('m/d/Y') }}", "{{ Carbon\Carbon::parse($reservation->dateDépart)->format('m/d/Y') }}"],
        @endforeach
    ];

    let resDates = [];
    reservationDates.forEach(element => {
        let start = Date.parse(element[0]);
        let end = Date.parse(element[1]);
        resDates.push([start, end]);
    });

    $('input[name="daterange"]').daterangepicker({
        opens: 'left',
        minDate: "{{ \Carbon\Carbon::now()->format('d/m/Y') }}",
        maxDate: "{{ \Carbon\Carbon::parse($propertie->disponibilite)->format('d/m/Y') }}",
        isInvalidDate: function(date) {
            let timestamp = date.valueOf();
            return resDates.some(range => timestamp >= range[0] && timestamp <= range[1]);
        }
    });
    </script>
</body>
</html>