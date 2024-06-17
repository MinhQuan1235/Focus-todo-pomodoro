@extends('layout.customer')


@section('content')
    <!-- Page body -->

    <div class="container-xl">
        <h1 class="" > Edit</h1>
    </div>
    <div class="container-xl">
        <div class="row p-3 align-items-center  border rounded-4">
            <div class="col-3 ">
                <!-- Page pre-title -->
                <h2 class="d-flex justify-content-center page-title">
                    1h30m
                </h2>
                <div class="d-flex justify-content-center page-pretitle">
                    <i class="ti ti-adjustments-check"></i>
                    Estimated Time
                </div>
            </div>
            <div class="col-3">
                <!-- Page pre-title -->

                <h2 class="d-flex justify-content-center page-title">
                    11
                </h2>
                <div class="d-flex justify-content-center page-pretitle">
                    Tasks to be Completed
                </div>
            </div>
            <div class="col-3">
                <!-- Page pre-title -->

                <h2 class="d-flex justify-content-center page-title">
                    0m
                </h2>
                <div class="d-flex justify-content-center page-pretitle">
                    Elapsed Time
                </div>
            </div>
            <div class="col-3">
                <!-- Page pre-title -->

                <h2 class="d-flex justify-content-center page-title">
                    2
                </h2>
                <div class="d-flex justify-content-center page-pretitle">

                    Completed Tasks
                </div>
            </div>

        </div>

        <div class="page-body">


            <div class="mb-3">
                <form action="" method="POST"  >
                    @csrf
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    @endif
                    <div class="input-group input-group-flat">
                        <button  class="input-group-text text-warning" type="submit">
                            Edit
                        </button>
                        <input  value="{{$task->name}}" name="taskname" type="text" class="form-control form-control-lg" autocomplete="off" placeholder="Press [Enter] to save" />
                        <span class="input-group-text quantity_podomoro">

                <input type="number" name="quantity_podomoro" value="{{$task->quantity_podomoro}}" hidden>

                @for ($i = 0; $i < 5; $i++)
                @php
                    $textYellowClass = ($i < $task->quantity_podomoro) ? 'text-yellow' : '';
                @endphp
                    <a href="#" class="link-secondary quantity_podomoro {{$textYellowClass}}"  >
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-3">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 12h3.5" />
                            <path d="M12 7v5" />
                        </svg>
                    </a>
                @endfor
                    <span class="link-secondary">
                        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-chevron-right"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>

                    </span>

                <input style="width: 20px; border:none;" class="form-control " placeholder="Select a date" id="e_datepicker-icon" value="{{ date('Y-m-d') }}" name="select_date">
                <span class="input-icon-addon"><!-- Download SVG icon from http://tabler-icons.io/i/calendar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path><path d="M16 3v4"></path><path d="M8 3v4"></path><path d="M4 11h16"></path><path d="M11 15h1"></path><path d="M12 15v3"></path></svg>
                </span>


                </span>

                    </div>

                </form>
            </div>





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
                    element: document.getElementById('e_datepicker-icon'),
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
                    element: document.getElementById('e_datepicker-icon-prepend'),
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

