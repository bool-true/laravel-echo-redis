<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="//{{ Request::getHost() }}:6002/socket.io/socket.io.js"></script>
        <script src="/js/app.js"></script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style> 
        
        
        </style>
    </head>
    <body>
        
        <div>测试频道</div>      
    
    </body>
    <script>
    
        window.Echo.private('privatePush.'+{{Auth::user()->id}})
        .listen('PrivateMessageEvent', (e) => {
            alert(e.message);
            console.log(e);
        });

    </script>
</html>
