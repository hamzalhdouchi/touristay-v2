<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 

class UserController extends Controller
{
    public function store(Request $request)
    {
        
            $validatedData = $request->validate([
                'name' => 'required|min:3|max:100',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
                'telephone' => 'required|string|min:10',
                'image' =>'required',
                'role_id'=> 'required',
            ]);
            
            if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile','public');
           
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
               
                'password' => Hash::make($validatedData['password']),
               
            ]);
            session()->flash('success','the user is create');
            return back();
        }else{
            session()->flash('errur','the user is nott created');
            return back();
        }
    }
    

    public function login()
{

    // $credentials = $request->validate([
    //     'email' => 'required|email',
    //     'password' => 'required|min:8',
    // ]);

    // if (Auth::attempt($credentials)) {
    //     return redirect()->intended('/dashboard'); 
    // }

    // $user = User::where('email', $request->email)->first();
    // if (!$user) {
    //     session()->flash('error', 'The email address you entered is not registered.');
    // } else {
    //     session()->flash('error', 'The password you entered is incorrect.');
    // }

    return view('auth.login'); 
}


    public function logout()
    {
        Auth::logout(); 

        session()->invalidate();
        session()->regenerateToken();

        return redirect('/'); 
    }

    public function update(request $request)
    {
    $request->validate([
        'name' => 'required|min:3|max:100',
        'email' => 'required|email', 
        'telephone' => 'required|string|min:10',
        'image' => 'nullable|image', 
    ]);

    $user = User::find($request->id);
    
    if (!$user) {
        session()->flash('error', 'User not found');
        return back();
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->telephone = $request->telephone;
    $user->adresse = $request->adresse;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('profile','public'  );
        $user->image = $imagePath; 
    }

    $user->save();

    session()->flash('success', 'Profile updated successfully');
    return back();
        
    }
}

