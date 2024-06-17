<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Focus Todo</title>
    <!-- CSS files -->
    <link href="{{asset("/dist/css/tabler.min.css")}}" rel="stylesheet"/>
    <link href="{{asset("/dist/css/tabler-flags.min.css")}}" rel="stylesheet"/>
    <link href="{{asset("/dist/css/tabler-payments.min.css")}}" rel="stylesheet"/>
    <link href="{{asset("/dist/css/tabler-vendors.min.css")}}" rel="stylesheet"/>
    <link href="{{asset("/dist/css/demo.min.css")}}" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
            background-image: url('./../../dist/img/c540018ca1c7b93cb1fbc218ea0c73a7.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .welcome-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-content {
            text-align: center;
        }
        .welcome-content h1 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }
        .welcome-content p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 30px;
        }
        .welcome-btns {
            display: flex;
            justify-content: center;
        }
        .welcome-btn {
            margin: 0 10px;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .welcome-btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .welcome-btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        .welcome-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="welcome-container">
    <div class="welcome-content">
        <h1>Welcome to Focus Todo</h1>
        <p>Sign in to use the app. If you don't have an account yet, please sign up.</p>
        <div class="welcome-btns">
            <a href="{{route('sign-in')}}" class="welcome-btn welcome-btn-primary">Sign In</a>
            <a href="{{route('sign-up')}}" class="welcome-btn welcome-btn-secondary">Sign Up</a>
        </div>
    </div>
</div>

<!-- Libs JS -->
<script src=" {{asset("/dist/libs/apexcharts/dist/apexcharts.min.js")}}" defer></script>
<script src=" {{asset("/dist/libs/jsvectormap/dist/js/jsvectormap.min.js")}}" defer></script>
<script src="{{asset("dist/libs/jsvectormap/dist/maps/world.js")}}" defer></script>
<script src=" {{asset("/dist/libs/jsvectormap/dist/maps/world-merc.js")}}" defer></script>
<!-- Table
