<?php

namespace App\Http\Controllers;

use App\Models\properties;
use App\Models\equipments;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
class propertiesController extends Controller
{
    public function create(Request $request)
    {

       

            $ValidationData = $request->validate([
                'titre' => 'required|string|min:5|max:200',
                'description' => 'required|string|min:5',
                'prix_par_nuit'  => 'required|numeric|min:0',
                'caution' => 'required|numeric|min:0',
                'chambres' => 'required|integer|min:1',
                'salles_de_bain' => 'required|integer|min:1',
                'adresse' => 'required|string',
                'ville' => 'required|string|min:2|max:100',
                'code_postal' => 'required|string|min:2|max:10',
                'user_id' => 'required|integer|exists:users,id',
                'equipments' => 'nullable|array',
                'equipments.*' => 'exists:equipments,id',
                'image' => 'required|image|max:2000', 
            ]);
        
        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('public/properties'); 
        }else {
                session()->flash('error', 'L image est requise!');
            };
            $property = properties::create([
                'titre' => $ValidationData['titre'],
                'description' => $ValidationData['description'],
                'prix_par_nuit' => $ValidationData['prix_par_nuit'],
                'caution' => $ValidationData['caution'],
                'chambres' => $ValidationData['chambres'],
                'salles_de_bain' => $ValidationData['salles_de_bain'],
                'adresse' => $ValidationData['adresse'],  
                'ville' => $ValidationData['ville'],
                'user_id' => $ValidationData['user_id'],
                'code_postal' => $ValidationData['code_postal'],
                'disponibilite' => $request->disponibilite,
                'image' => $imagePath,
            ]);

            if ($request->has('equipments')) {
                $property->equipments()->attach($request->equipments);
            }
            session()->flash('success', 'Propriété ajoutée avec succès!');
            return back();   
        }

        public function readPropretis()
        {
            $properties = properties::all();
            $équipements  = equipments::all();
            return view('location',compact('properties','équipements'));
        }

    
        public function propertiesById($id)
        {
            $propertie = properties::find($id);
            $équipements  = equipments::all();
            
            return view('form',compact('propertie','équipements'));
        }

        public function destroy($id)
        {
            if (properties::find($id)) {
                properties::destroy($id);
                session()->flash('success', 'Destruction réussie.');
            } else {
                session()->flash('errur', 'L\'élément n\'existe pas.');
            }
            
            return back();
        }

        public function update(Request $request,$id)
        {
            $request->validate([
                'titre' => 'required|string|min:5|max:200',
                'description' => 'required|string|min:5',
                'prix_par_nuit'  => 'required|numeric|min:0',
                'caution' => 'required|numeric|min:0',
                'chambres' => 'required|integer|min:1',
                'salles_de_bain' => 'required|integer|min:1',
                'adresse' => 'required|string',
                'ville' => 'required|string|min:2|max:100',
                'code_postal' => 'required|string|min:2|max:10',
                'equipments' => 'nullable|array',
                'equipments.*' => 'exists:equipments,id',
                'image' => 'required|image|max:2000', 
            ]);

            $reservation = Reservation::where($id)->get();
            if ($reservation->dateDépart < $request->disponibilite) {
                $propertie = properties::find($id);
            if (!$propertie) {
                session()->flash('errur', 'User not found');
                return back();
            }

            if ($request->has('image')) {
                $imagePath = $request->file('image')->store('public/properties'); 
             }
            $propertie->titre = $request->titre;
            $propertie->description = $request->description;
            $propertie->caution = $request->caution;
            $propertie->chambres = $request->chambres;
            $propertie->salles_de_bain = $request->salles_de_bain;
            $propertie->adresse = $request->adresse;
            $propertie->ville = $request->ville;
            $propertie->code_postal = $request->code_postal;
            $propertie->disponibilite =$request->disponibilite;
            $propertie->image = $imagePath;
           
            if ($request->has('equipments')) {
                $propertie->equipments()->sync($request->equipments);
            }
            }else
            {
                session()->flash('error','date unvalide');
            }
            $propertie->save();
            
            session()->flash('success', 'properties updated successfully');
            return redirect('/properties');
        }

        public function readPropretisDit($id)
        {
            $propertie = properties::with('equipments','user')->find($id);
            return view('form.formReservation',compact('propertie'));
        }

        public function readAllProperties(Request $request)
        {
            
            $user = Auth::user();
            $favoris = $user->favoris->pluck('id');
            $perPage = $request->input('perPage', default: 10);
            if (!in_array($perPage, [2, 10, 15])) {
                $perPage = 10;
            }
            
            $properties = Properties::with('equipments', 'favoris')->paginate($perPage);
            $properties->appends(['perPage'=>$perPage]);
            $reservation =Reservation::where('user_id', Auth::user()->id)->get();
            return view('Home', compact('properties','favoris','perPage','reservation'));
        }
        
        

        public function favoriteCreate($id)
        {
            $user = Auth::user();
            if ($user) {
                $user->favoris()->attach($id);
                session()->flash('success', 'Ajouté aux favoris!');
            } else {
                session()->flash('error', 'Veuillez vous connecter.');
            }
    
            return back();
        }

        public function removeFavorite($id)
        {
            $user = Auth::user();

            $user->favoris()->detach($id);  

            return back();
        }

        public function showFavoris()
        {
            $user = Auth::user();  
            $favoris = $user->favoris;  

            return view('favori', compact('favoris'));
        }

        public function dynamicSearch(Request $request)
        {
            $search = $request->input('search');  
            $properties = Properties::where('titre', 'like', "%{$search}%")
                                    ->orWhere('description', 'like', "%{$search}%")
                                    ->paginate(5);  
                                    $favoris = Auth::user()->favoris->pluck('id');
            return view('Home', compact('properties', 'search','favoris'));
        }
        
    }
    

