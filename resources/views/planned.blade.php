@extends('layout.customer')

@section('content')
    <div class="container-xl">
        <h1 class="" > {{ $title }} </h1>
    </div>
    <!-- Page body -->
    <div class="container-xl">
        <div class="row p-3 align-items-center  border rounded-4">
            <div class="col-6 ">
                <!-- Page pre-title -->
                <h2 class="d-flex justify-content-center page-title">
                    @php
                        $totalTime = 0;
                    @endphp
                    @foreach ($tasks as $task)
                        @if(!$task->isCompleted())
                            @switch($task->quantity_podomoro)
                                @case(1)
                                    @php $totalTime += 25; @endphp
                                    @break
                                @case(2)
                                    @php $totalTime += 50; @endphp
                                    @break
                                @case(3)
                                    @php $totalTime += 75; @endphp
                                    @break
                                @case(4)
                                    @php $totalTime += 100; @endphp
                                    @break
                                @case(5)
                                    @php $totalTime += 125; @endphp
                                    @break
                                @default
                                    {{-- Xử lý nếu cần --}}
                            @endswitch
                        @endif
                    @endforeach
                    @php
                        $hours = floor($totalTime / 60);
                        $minutes = $totalTime % 60;
                    @endphp
                    {{ $hours }} h {{ $minutes }} m
                </h2>
                <div class="d-flex justify-content-center page-pretitle">
                    <i class="ti ti-adjustments-check"></i>
                    Estimated Time
                </div>
            </div>
            <div class="col-6">
                <!-- Page pre-title -->

                <h2 class="d-flex justify-content-center page-title">
                    @php
                        $tobeCompleted = 0;
                    @endphp

                    @foreach($tasks as $task)
                        @if(!$task->isCompleted())
                            @php
                                $tobeCompleted++;
                            @endphp
                        @endif
                    @endforeach
                    {{ $tobeCompleted }}
                </h2>
                <div class="d-flex justify-content-center page-pretitle">
                    Tasks to be Completed
                </div>
            </div>
        </div>

        <div class="page-body">


            <div class="mb-3">
                <form action="{{route('store.planned')}}" method="POST"  >
                    @csrf
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    @endif
                    <div class="input-group input-group-flat ">

                        <button  class="input-group-text" type="submit">

                            <a  href="" class="link-secondary" title="New Task" data-bs-toggle="tooltip">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                            </a>

                        </button>
                        <input name="taskname" type="text" class="form-control form-control-lg" autocomplete="off" placeholder="Add a tasks to 'tasks', press [Enter] to save" />




                        <span class="input-group-text quantity_podomoro">

                <input type="number" name="quantity_podomoro" hidden>
                @for ($i = 0; $i < 5; $i++)
                                <a href="#" class="link-secondary quantity_podomoro "  title="Add podomoro">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-3">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 12h3.5" />
                            <path d="M12 7v5" />
                        </svg>
                    </a>
                            @endfor
                    <span class="link-secondary">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M9 6l6 6l-6 6" />
                        </svg>

                    </span>

                <input style="width: 20px; border:none;" class="form-control " placeholder="Select a date" id="datepicker-icon" value="{{ date('Y-m-d') }}" name="select_date">
                <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                </span>


                </span>
                    </div>
                </form>
            </div>
            @foreach($groupedTasks as $date => $tasks)
                @php
                    // Lọc các task để chỉ giữ lại các task chưa hoàn thành
                    $uncompletedTasks = $tasks->filter(function($task) {
                        return !$task->isCompleted();
                    });
                @endphp

                @if($uncompletedTasks->isNotEmpty())
                    <h3>{{ $date }}</h3>
                    @foreach($uncompletedTasks as $task)
                        <div class="border-0 rounded-2 bg-white mb-2">
                            <div class="input-group input-group-flat " style="min-height: 46px;">
                <span class="input-group-text  ">
                    <form action="{{route('task.completed',$task->id)}}" method="POST">
                        @csrf
                        <button class="form-check-input m-0" type="checkbox" style="border-color: {{$task->getPriorityColor()}}">
                        </button>

                    </form>


                </span>


                                <span class="input-group-text border border-start-0">
                    <a href="{{route("countdown.show",$task->id)}}" class="link-secondary" title="Play" data-bs-toggle="tooltip">
                       <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="#ff6b6b"  class="icon icon-tabler icons-tabler-filled icon-tabler-player-play">
                           <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                           <path d="M6 4v16a1 1 0 0 0 1.524 .852l13 -8a1 1 0 0 0 0 -1.704l-13 -8a1 1 0 0 0 -1.524 .852z" />
                       </svg>
                    </a>
                </span>

                                <div class="form-control d-flex flex-column">
                                    <div class="d-flex align-items-center">
                                        <!-- Hàng trên -->
                                        <p>{{$task->name}}
                                            @if($task->tags->isNotEmpty())
                                                @foreach($task->tags as $tag)
                                                    <span class="badge bg-secondary"> #{{$tag->name}} </span>
                                                @endforeach
                                            @endif
                                        </p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <!-- Container cho các biểu tượng -->
                                        <div class="d-flex flex-nowrap">
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


                                <span class="input-group-text">

                <div class="link-secondary">

                    @if ($task->due_date_at->isToday())
                        Today
                    @elseif ($task->due_date_at->isTomorrow())
                        Tomorrow
                    @elseif ($task->due_date_at->isCurrentWeek())
                        This week
                    @elseif ($task->due_date_at->isCurrentMonth())
                        @if ($task->due_date_at->isPast())
                            <span class="text-danger">
                                {{ $task->getDeadlineCommonFormat() }}
                            </span>
                        @else
                            {{ $task->getDeadlineCommonFormat() }}
                        @endif
                    @elseif ($task->due_date_at->isPast())
                        <span class="text-danger">
                                {{$task->getDeadlineCommonFormat() }}
                        </span>
                    @else
                        Task
                    @endif
                </div>
                </span>
                                <span  class="border border-start-0 input-group-text  link-secondary" >
                                    <button class="btn border border-0" data-bs-toggle="modal" data-bs-target="#taskModal{{$task->id}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-edit">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"/>
                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"/>
                                    <path d="M16 5l3 3"/>
                                </svg>
                            </button>
                </span>
                            </div>

                        </div>
                        {{-- modal --}}
                        <div class="modal modal-blur fade" id="taskModal{{$task->id}}" tabindex="-1" aria-labelledby="taskModalLabel{{$task->id}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Task</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
                                    </div>
                                    <div class="modal-body">
                                        <x-edit-task-component  :task="$task" :tags="$tags"  :projects="$projects"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @endif
            @endforeach





        </div>


        <script>

            const numberPodomoro = document.querySelector('.quantity_podomoro input')
            $('a.quantity_podomoro').click(function(event){
                // Ngăn chặn hành vi mặc định của liên kết
                event.preventDefault();

                // Thêm hoặc xóa lớp 'text-yellow' cho phần tử <a> được nhấn vào
                $(this).toggleClass('text-yellow');

                var index = $(this).index('.quantity_podomoro');


                $('a.quantity_podomoro').removeClass('text-yellow').slice(0, index ).addClass('text-yellow');
                numberPodomoro.value = index  ;
                console.log(numberPodomoro.value);
            });


        </script>
        <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function () {
                window.Litepicker && (new Litepicker({
                    element: document.getElementById('datepicker-icon'),
                    buttonText: {
                        previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                        nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                    },
                }));
            });
            // @formatter:on
        </script>
        <script>
            // @formatter:off
            document.addEventListener("DOMContentLoaded", function () {
                window.Litepicker && (new Litepicker({
                    element: document.getElementById('datepicker-icon-prepend'),
                    buttonText: {
                        previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                        nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                    },
                }));
            });
            // @formatter:on
            function editDatePicker(taskID){
                window.Litepicker && (new Litepicker({
                    element: document.getElementById('datepicker-icon-edit-'+ taskID),
                    buttonText: {
                        previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                        nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                    },
                }));
            }

        </script>
        <script>

            document.querySelectorAll('.select-beast').forEach((el)=>{
                new TomSelect(el, {
                    plugins: {
                        remove_button: {
                            title: 'Remove this item',
                        }
                    },
                    persist: false,
                });
            });


        </script>
        @if (session('modal_id'))
            <script>
                $(document).ready(function() {
                    $('#{{ session('modal_id') }}').modal('show')
                });
            </script>
    @endif
@endsection

