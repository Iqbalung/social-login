<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()

    {
        return Socialite::driver('google')->redirect();
    }

        
    /**

     * Create a new controller instance.
     *
     * @return void
     */

    public function handleGoogleCallback()

    {

        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }
    
        // Cek apakah user telah terdaftar sebelumnya
        $existingUser = User::where('email', $user->getEmail())->first();
    
        if ($existingUser) {
            // Perbarui nama pengguna jika berbeda dengan yang ada di database
            if ($existingUser->name !== $user->getName()) {
                $existingUser->name = $user->getName();
                $existingUser->save();
            }
    
            auth()->login($existingUser, true);
        } else {
            // Buat user baru
            $newUser = new User;
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            $newUser->password = bcrypt(Str::random(16));
            $newUser->save();
            auth()->login($newUser, true);
        }
    
        return redirect('/dashboard');
    }
}