<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Socialite;
use Auth;
use File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SocialAuthController extends Controller
{

    protected $redirectTo = '/';

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()

    {
        $user = Socialite::driver('facebook')->user();
        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser, true);

        activity()
            ->withProperties(['customProperty' => 'customValue'])
            ->log('FacebookLogin');

        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }

        $user = User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => 'facebook',
            'provider_id' => $user->id
        ]);

        $user->assign('facebook');

        //Line Notify
        $token = DB::table('settings')->select('setting_linetoken')->first()->setting_linetoken;
        $newuser = $user['name'];
        $msg = 'คุณ '.$newuser . ' สมัครสมาชิกใหม่ด้วย Facebook ระดับผู้ใช้งาน Facebook';
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', 'https://notify-api.line.me/api/notify',[
            'headers' => [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer ' .$token
            ],
            'form_params' => [
                'message' => $msg
            ]
        ]);

        activity()
            ->withProperties(['customProperty' => 'customValue'])
            ->log('FacebookRegister');

        return $user;

    }
}
