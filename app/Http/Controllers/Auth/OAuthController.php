<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Socialite;
use Auth;

class OAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->stateless()->user();

        if($user = User::where(['email' => $userSocial->getEmail()])->first()){
            Auth::login($user);
            return redirect('/mypage');
        }else{
            $newUser = new User;
            $newUser->name = $userSocial->getName();
            $newUser->email = $userSocial->getEmail();
            $newUser->line_id = $userSocial->getId();
            $newUser->save();

            Auth::login($newUser);
        }
        //  ログイン処理
        return redirect('/mypage');
    }
}
