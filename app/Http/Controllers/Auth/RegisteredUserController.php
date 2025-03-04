<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
  
            $vv = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'telephone' => ['required', 'string', 'min:10', 'max:30'],
                'image' => ['required', 'image'],
                'role_id' => ['required', 'integer', 'exists:roles,id'],
            ]);
        


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profiles', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'image' => $imagePath,
            'role_id' => $request->role_id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        session()->flash('success', 'Votre compte a été créé avec succès !');
        // return redirect(RouteServiceProvider::HOME);
        return redirect('/inscrer'); 

    }
}
