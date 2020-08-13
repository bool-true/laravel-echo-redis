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

class PublicMessageEvent extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    //消息内容
    public $message;

    public function __construct(string $message)
    {
        $this->message = $message;
        \Log::info($message.PHP_EOL);
    }

    //返回一个公共频道  频道名称为push
    public function broadcastOn()
    {   
        return new Channel('push');
    }


    //laravel 默认会使用事件的类名作为广播名称来广播事件,自定义:
    public function broadcastAs(){
        return 'push.message';
    }

    public function broadcastWith()
    {   
        return [
            'data' => '处理事件时返回的数据',
            'message' => $this->message,
        ];
    }

}
