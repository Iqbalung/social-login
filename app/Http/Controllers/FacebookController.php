<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
           

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    { try {
            $user = Socialite::driver('facebook')->user();
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