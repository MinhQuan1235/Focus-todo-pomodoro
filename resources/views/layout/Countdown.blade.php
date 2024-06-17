<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Focus-Todo</title>
    <link href="{{asset("/dist/css/countdown.css")}}" rel="stylesheet"/>
    <link href="{{asset("/dist/css/tabler.min.css")}}" rel="stylesheet"/>

    <link href="{{asset("/dist/css/demo.min.css")}}" rel="stylesheet"/>

    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex align-items-start justify-content-center ">
        <div class="border-0 rounded-2 bg-white m-5 " style="width: 440px; " >
            <div class="input-group input-group-flat  " style="min-height: 46px;">
                <span class="input-group-text  ">

                <form id="pomodoroForm" action="{{route('pomodoro.completed',$task->id)}}" method="POST">
                    @csrf
                    <button id="pomodoroCheckbox" class="form-check-input m-0" type="checkbox" style="border-color: {{$task->getPriorityColor()}}" >
                    </button>

                </form>
                </span>

                <div class="form-control d-flex flex-column">
                    <div class="d-flex align-items-center">
                        <!-- Hàng trên -->
                        <p>
                            {{$task->name}}

                        </p>
                    </div>
                    <div class="d-flex align-items-center">
                        <!-- Container cho các biểu tượng -->
                        <div class="d-flex flex-nowrap">
                            <div id="pomodoro_count" data-quantity-podomoro="{{ $task->quantity_podomoro }}"></div>

                        @for($i = 1; $i <= $task->quantity_podomoro; $i++)
                                <!-- Mỗi biểu tượng -->
                                <div class="mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 27" fill="none" stroke="#ff8585" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-3">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 12h3.5" /><path d="M12 7v5" />
                                    </svg>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <span  class="border border-start-0 input-group-text  link-secondary" >
                    <a href="/home">

                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M18 6l-12 12" /><path d="M6 6l12 12" />
                        </svg>
                    </a>
                </span>
            </div>

        </div>
    </div>
    <div class="container">
        <div id="sessionlength-container" class="toggle-button-container d-none" >
            <header>Session Length</header>
            <time id="session-length"></time>
            <div class="toggle-button-container__sub-container">
                <button class="toggle-timer" type="button" id="decrease-session">-</button>
                <button class="toggle-timer" type="button" id="increase-session">+</button>
            </div>
        </div>

        <div id="breaklength-container" class="toggle-button-container d-none">
            <header>Break Length</header>
            <time id="break-length"></time>
            <div class="toggle-button-container__sub-container">
                <button class="toggle-timer" type="button"  id="decrease-break">-</button>
                <button class="toggle-timer" type="button"  id="increase-break">+</button>
            </div>
        </div>

        <div id="countdown-container">
            <header id="type"></header>
            <time  id="countdown"></time>
        </div>

        <div id="button-container">
            <button class="btn rounded-3 " type="button" id="start-session">Start To Focus</button>
            <button class="btn rounded-3 " type="button" id="pause-session">Pause</button>

            <button class="btn rounded-3 " type="button" id="continue-session" style="display: none;">Continue</button>
            <button class="btn rounded-3" type="button" id="stop-session">Stop</button>
            <button class="btn rounded-3 " type="button" id="reset-session">Reset</button>
        </div>
    </div>
</div>


</body>


<script src=" {{asset("/dist/js/countdown.js")}}" defer></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</html>
