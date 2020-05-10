<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/fontawe/css/all.css">
    <title>Document</title>
    <style>
        .logo{
            float: right;
            padding-right: 150px;
            width: 150px;
        }
        .cabecera{
            text-align: center;
            font-size: x-large;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-bottom: 20px;
        }
        .contenido form{
            width: 300px;
            margin:0 auto;
        }
        .contenido table th{
            background-color:#253663;
            color:white;
        }
        .contenido table{
            margin:0 auto;
        }
        .pie{
            position: fixed;
            bottom: 0px;
            width: 100%;
            font-size: 0.7em;
            margin-boton:15px;
            text-align: center;
            color: white;
            background-color: black;
        }
        .boton{            
            margin:7px 7px;
            background-color:red;
            height: 30px;
            color:white;
            border-radius: 10px;
        }
        .navbar-nav {
            width: 100%;
            text-align: center;

        }

        .navbar-nav > li {
            float: none;
            display: inline-block;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .icon{            
            text-align: center;
        }

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
    </style>
</head>
<body>
    
    <div class="cabecera">

        @include('layouts.navbar')
        <!--
        <img src="/images/logosiata.png" alt="" class="logo">        
        -->
        @yield('cabecera')
        
        
    </div>

    <div class="contenido">

        @yield('contenido')

    </div>

    <div class="pie">

        @yield('pie')
        desarrollado por @edwinroman
        
    </div>
</body>
</html>