
# laravel-echo-redis
laravel-echo 用redis作为驱动广播事件

github下载包后

Laravel-echo 安装
Laravel Echo是一个JavaScript库，web端可以轻松订阅频道并收听Laravel广播的事件，
需要node 的npm包管理器安装 没有的自行度娘安装node
首先cmd 执行 npm install 安装package.json里的依赖 （必须）,抽根烟等会儿
接着执行 npm install laravel-echo-server 安装 laravel-echo服务端
最后执行 npm install laravel-echo 安装 laravel-echo前端资源(可省略一般第二部都已经安装了，但是安装更新一下最好)


初始化 laravel-echo-server

  laravel-echo-server init
// 是否在开发模式下运行此服务器（y/n） 输入y
? Do you want to run this server in development mode? (y/N) 
// 设置服务器的端口 默认 6001 输入 6001就可以了 或者你想要的
? Which port would you like to serve from? (6001)
// 想用的数据库  选择 redis
? Which database would you like to use to store presence channel members? (Use arrow keys)
❯ redis 
  sqlite 
//   这里输入 你的laravel  项目的访问域名
? Enter the host of your Laravel authentication server. (http://localhost) 
// 选择 网络协议 http
? Will you be serving on http or https? (Use arrow keys)
❯ http 
  https 
// 您想为HTTP API生成客户端ID/密钥吗 N
? Do you want to generate a client ID/Key for HTTP API? (y/N) 
// 要设置对API的跨域访问吗？（y/n）N
Configuration file saved. Run laravel-echo-server start to run server.

最后开始执行测试：

1.运行redis 服务 redis-server（cmd 运行）
2.运行 队列 php artisan queue:listen（cmd 运行）
3.运行laravel-echo 服务 laravel-echo-server start（cmd 运行）
4.编译js文件 npm run dev（cmd 运行）
5.浏览器访问 项目域名/echo
浏览器访问 项目域名/push/测试
echo 页面 会自动弹出alert 测试
