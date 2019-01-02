<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            .main{
                width:125px;
            }
            button{
                display:block;
                width:100%;
                color:#fff;
                background-color:#39f;
                border:0;
                padding:6px;
                text-align:center;
                font-size:12px;
                border-radius:4px;
                cursor:pointer;
                outline:none;
                position:relative;
            }
            button:active{
                top:1px;
                left:1px;
            }
            .dropdown{
                width:100%;
                height:150px;
                margin:5px 0;
                font-size:12px;
                background-color:#fff;
                border-radius:4px;
                box-shadow:0 1px 6px rgba(0,0,0,0.2);
            }
            .dropdown p {
                display:inline-block;
                padding:6px;
            }
        </style>
    </head>
    <body>
    <div id="app">
        <div class="test">
                <div class="dir" v-test:msg.a.b="message"></div>
        </div>

        <div class="main" v-clockoutside="handleClose">
            <button @click="show= !show">点击显示下拉菜单</button>
            <div class="dropdown" v-show="show">
                <p>下拉框的内容，点击外面区域可以关闭</p>
            </div>
        </div>
        <div>
           message
        </div>
    </body>
</html>
