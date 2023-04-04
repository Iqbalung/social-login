<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TiktokController extends Controller
{
    /**
     * Redirect the user to the TikTok authentication page.
     *
     * @return void
     */
    public function redirectToTikTok()
    {
        return Socialite::driver('tiktok')->redirect();
    }

    /**
     * Obtain the user information from TikTok.
     *
     * @return void
     */
    public function handleTiktokCallback()
    {
        try {
            $user = Socialite::driver('tiktok')->user();

            $findUser = User::where('tiktok_id', $user->id)->first();

            if($findUser){
                Auth::login($findUser);
                return Redirect::to('http://127.0.0.1:8000');
                return redirect()->intended('dashboard');
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email], [
                    'name' => $user->name,
                    'tiktok_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);

                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
