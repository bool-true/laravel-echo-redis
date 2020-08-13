<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('privatePush.{id}', function ($user, $id) {
    \Log::info('channel');
    return (int) $user->id === (int) $id;
});

/***
channel 方法接收两个参数： 频道的名称和一个通过返回 true 或 false ，来表示用户是否有权收听该频道的回调函数 。

所有授权回调都将当前经过身份验证的用户作为其第一个参数，并将任何其他通配符参数作为其后续参数。 在这个例子中，我们用 {id} 占位符来通配表示频道名称 “ID” 的部分。
***/