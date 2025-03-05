<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\ReservationRequeste;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations =  Reservation::with('properties')->where('user_id', Auth::user()->id)->get();
        
        return view('meReservation',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ReservationRequeste $request,$id)
    {
        $reservatioDate = explode("-",$request->daterange);
        $dataArrivée = Carbon::parse($reservatioDate[0]);
        $dateDépart = Carbon::parse($reservatioDate[1]);
        Reservation::create([
            'user_id'=> $request->user_id,
            'properties_id' => $id,
            'dataArrivée' => $dataArrivée,
            'dateDépart' => $dateDépart,
            'prix_Total' => $request->prix_Total,
        ]);
        
        session()->flash('s');
        return to_route('readAll.properties');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequeste $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $reservations =  Reservation::with('properties')->with('user')->get();
        
        return view('reservationProperties',compact('reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservationRequeste $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation = Reservation::destroy($id);
    
        if ($reservation) {
            session()->flash('success', 'La suppression a réussi');
        } else {
            session()->flash('error', 'Une erreur est survenue lors de la suppression');
        }
    
        return back(); 
    }
}
