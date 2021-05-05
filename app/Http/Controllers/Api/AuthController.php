<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $code = $request->code;
        $appid = config('services.wx.appid');
        $appsecret = config('services.wx.appsecret');
        $url = 'https://api.weixin.qq.com/sns/jscode2session?appid='.$appid.'&secret='.$appsecret.'&js_code='.$code.'&grant_type=authorization_code';
        $response = Http::withOptions(['verify' => false])->get($url);
        $data = $response->json();
        if($data['openid']) {
            $user = User::firstOrCreate(['open_id' => $data['openid']], ['open_id' => $data['openid']]);
            return response()->json(['token' => $user->createToken('wx')->accessToken]);
        }
        //return response()->json($response->json()['openid']);
    }
}
