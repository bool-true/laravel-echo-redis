<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class SubscribeMsg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Sub:Msg {--channel=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SUBSCRIBE';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   
        $channel = $this->option('channel');
        // 启用redis订阅功能   持续监听$channel队列是否有消息   如果要消息就会到回调里面被echo
       Redis::subscribe([$channel],function ($message){
            echo $message.PHP_EOL;
        });

       
       //Laravel说明文档中的 Redis 发布与订阅案例，命令行运行php artisan redis:subscribe 到60s自动断开并报错
       //据Predis作者在配置文件中说明，因为在底层网络资源上执行读取或写入操作时使用了超时，默认设置了timeout 为60s。
       
       //在config/database.php配置文件中，找到redis配置项，添加一行如下
       //'read_write_timeout' => 0,

    }
}
