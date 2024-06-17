@extends('layout.customer')

@section('content')
    <div class="container-xl">
        <h1 class="" >{{ $title }}</h1>
    </div>
    <!-- Page body -->
    <div class="container-xl">


        <div class="page-body">




        </div>
        <div class="cotainer">
            @foreach($groupedTasks as $date => $tasks)
                @php
                    // Lọc các task để chỉ giữ lại các task chưa hoàn thành
                    $completedTasks = $tasks->filter(function($task) {
                        return $task->isCompleted();
                    });
                @endphp

                @if($completedTasks->isNotEmpty())
                    <h3>{{$date}}</h3>
                @foreach($tasks as $task)

                    @if($task->isCompleted())
                        <div class="border-0 rounded-2 bg-white mb-2 active  ">
                            <div class="border-0 rounded-2 bg-white mb-2  " >
                                <div class="input-group input-group-flat border border-success rounded-2 " style="min-height: 46px;">
                <span class="input-group-text  ">
                    <form action="{{route("task.uncompleted", $task->id)}}" method="POST">
                        @csrf
                        <button class="form-check-input m-0" type="checkbox" >
                        </button>

                    </form>


                </span>


                                    <div class="form-control d-flex flex-column">
                                        <div class="d-flex align-items-center">
                                            <!-- Hàng trên -->
                                            <s>{{$task->name}}
                                                @if($task->tags->isNotEmpty())
                                                    @foreach($task->tags as $tag)
                                                        <span class="badge bg-secondary"> <s> #{{$tag->name}}</s> </span>
                                                    @endforeach
                                                @endif
                                            </s>
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
                                <form action="/home/delete/{{$task->id}}" method="post">
                                @method('post')
                                    @csrf

                                    <button style=" background: #fff;" class="border-0 btn-ghost px-2 "  type="submit"  ><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="#ff1f1f"  class="icon icon-tabler icons-tabler-filled icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" /><path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" /></svg></button>

                            </form>
                </span>


                                </div>

                            </div>
                        </div>
                    @endif

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
        </script>


@endsection

