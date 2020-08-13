<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;
class PublishMsg extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Pub:Msg {--channel=} {--message=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'PUBLISH';

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
        $message = $this->option('message');
        // echo "your params is :{$channel}, {$message}"
        
        try{
                         // 队列名称 消息
            Redis::publish($channel,$message);

        }catch (\Exception $e){

                echo "发送失败";
        }

        //cmd 运行 php artisan Pub:Msg --channel a --message b
    }
}
