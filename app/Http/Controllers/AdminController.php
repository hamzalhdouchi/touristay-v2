<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

use App\Models\properties;
use App\Models\equipments;
use App\Models\User;

class AdminController extends Controller
{
    public function read()
    {
        $users = User::All();
        $totalUser = User::count();
        $totalProperties = properties::count();
        return view('Gestionuser',compact('users','totalUser','totalProperties'));
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();

            session()->flash('success', 'L\'utilisateur a été supprimé avec succès.');
            return redirect()->route('user.read'); 
        }

        session()->flash('error', 'L\'utilisateur demandé n\'existe pas.');
        return back(); 
    }

    public function changeStatus(Request $request,$id)
    {
        $request->validate([
            'status'=> 'required|in:actif,suspandu'
        ]);

        user::where('id',$id)->update(['status'=> $request->status]);
        session()->flash('success', 'Statut mis à jour avec succès !');        return back();


    }

    public function readById(){
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        return view('gestionProfile',compact('user'));
    }

    public function readPropretis()
    {
        $properties = properties::all();
        $équipements  = equipments::all();
       
        return view('adminAn',compact('properties','équipements'));
    }

    public function destroyProperties($id)
        {
            if (properties::find($id)) {
                properties::destroy($id);
                session()->flash('success', 'Destruction réussie.');
            } else {
                session()->flash('errur', 'L\'élément n\'existe pas.');
            }
            return back();
        }
}