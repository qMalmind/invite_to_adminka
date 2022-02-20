<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\Models\Invites;
use Illuminate\Support\Facades\URL;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function create_invite(Request $request){
        $token = $this->generate_token(20);
        $invite = new Invites();
        $invite->token = $token;
        $invite->user_id = 1;
        $invite->save();

        $url = route('register', [
            'token' => $token
        ]);
        return $url;
    }

    public function generate_token($length){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
