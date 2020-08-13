<?php

namespace App\Events;

use Event;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class PrivateMessageEvent extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //消息内容
    public $message;

    //用户
    public $user;
    
    public function __construct(User $user, string $message)
    {   

        $this->user = $user;
        $this->message = $message;
    }

    // 创建私有频道
    public function broadcastOn()
    {      
        /***
        Illuminate\Broadcasting\PrivateChannel {#383 ▼
          +name: "private-privatePush.4"
        }
        ***/
        return new PrivateChannel('privatePush.' . $this->user->id);
    }

    // 控制广播数据:
    public function broadcastWith()
    {
        return ['message' => $this->message];
    }

}
