<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    

    use Notifiable {
        notify as protected laravelNotify;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','web_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


      public function notify($instance)
    {	
    	
        // 如果要通知的人是当前用户，就不必通知了！
        // if ($this->id == Auth::id()) {
        //     return;
        // }

        // 只有数据库类型通知才需提醒，直接发送 Email 或者其他的都 Pass
        if (method_exists($instance, 'toDatabase')) {
            $this->increment('notification_count');//字段加一
        }

        $this->laravelNotify($instance);//发送通知
    }


    public function markAsRead()
    {   
        // 标记为已读，未读数量清零
        $this->notification_count = 0;
        $this->save();
        $this->unreadNotifications->markAsRead();
    }


}


