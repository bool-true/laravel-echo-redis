<?php

namespace App\Http\Controllers;

use App\Events\PublicMessageEvent;//引入广播事件类
use App\Events\PrivateMessageEvent;//引入广播事件类
use DB;

class EchoController extends Controller
{
    public function echo(){
        return view('echo');
    }


    public function push($message){
        broadcast(new PublicMessageEvent($message));
    }


    public function privatepush($message,$id){

        $user = \App\Models\User::find($id);
        if (empty($user)) return '无此用户';
        broadcast(new PrivateMessageEvent($user, $message));

    }
    
    public function auth(){
        \Log::info(request()->all());
        return true;
    }

}
