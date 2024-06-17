<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Dashboard - Tabler - Premium and Open Source dashboard template with responsive and high quality UI.</title>
    <!-- CSS files -->
    <link href="{{ asset('/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/dist/css/demo.min.css') }}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.min.css" rel="stylesheet">


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
    <script src="{{ asset('dist/js/demo-theme.min.js') }}"></script>

    {{-- <script src="./dist/js/demo-theme.min.js?1684106062"></script> --}}
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg " data-bs-theme="dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="/home">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="#fffafa" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-alarm">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                            <path d="M12 10l0 3l2 0" />
                            <path d="M7 4l-2.75 2" />
                            <path d="M17 4l2.75 2" />
                        </svg>
                        Focus-Todo
                    </a>
                </h1>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.today') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-sun">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path
                                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Today
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.tomorrow') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-sunset-2">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M3 13h1" />
                                        <path d="M20 13h1" />
                                        <path d="M5.6 6.6l.7 .7" />
                                        <path d="M18.4 6.6l-.7 .7" />
                                        <path d="M8 13a4 4 0 1 1 8 0" />
                                        <path d="M3 17h18" />
                                        <path d="M7 20h5" />
                                        <path d="M16 20h1" />
                                        <path d="M12 5v-1" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Tomorrow
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.week') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h16" />
                                        <path d="M8 14v4" />
                                        <path d="M12 14v4" />
                                        <path d="M16 14v4" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    This Week
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('create.planned') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-clock">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M10.5 21h-4.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3" />
                                        <path d="M16 3v4" />
                                        <path d="M8 3v4" />
                                        <path d="M4 11h10" />
                                        <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M18 16.5v1.5l.5 .5" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Planned
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('tasks.completed') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-circle-check">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M9 12l2 2l4 -4" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Completed
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/home">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-archive">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                        <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10" />
                                        <path d="M10 12l4 0" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">
                                    Tasks
                                </span>
                            </a>
                        </li>
                        <hr>
                        @foreach ($folders as $folder)
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-between align-items-center">
                                        <a href="{{ route('index.folder', $folder->id) }}"
                                            class="btn text-truncate d-inline-block border-0 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="#ffb8b8"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-folder">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                                            </svg>
                                            {{ $folder->name }}
                                        </a>
                                        <div class="d-flex flex-row justify-content-end">
                                            <a class="btn   border-0 p-0" data-bs-toggle="modal"
                                                data-bs-target="#folder-modal{{ $folder->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="icon icon-tabler icons-tabler-outline icon-tabler-dots">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M5 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                    <path d="M19 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                                </svg>
                                            </a>
                                            <button
                                                class="btn  dropdown-toggle dropdown-toggle-split border-0 ms-auto toggle-btn"
                                                type="button">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 toggle-container w-100 px-4">
                                        <ul class="toggle-list w-100  list-unstyled">
                                            @foreach ($folder->projects as $project)
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ route('index.project', $project->id) }}">
                                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="#ffb8b8"
                                                                class="icon icon-tabler icons-tabler-filled icon-tabler-circle">
                                                                <path stroke="none" d="M0 0h24v24H0z"
                                                                    fill="none" />
                                                                <path
                                                                    d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                                                            </svg>
                                                        </span>
                                                        <span class="nav-link-title">{{ $project->name }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @foreach ($projectsWithoutFolder as $project)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.project', $project->id) }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="#ffb8b8"
                                            class="icon icon-tabler icons-tabler-filled icon-tabler-circle">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 3.34a10 10 0 1 1 -4.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 4.995 -8.336z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">{{ $project->name }}

                                    </span>
                                </a>
                            </li>
                        @endforeach
                        @foreach ($tags as $tag)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index.tag', $tag->id) }}">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-tag">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path
                                                d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z" />
                                        </svg>
                                    </span>
                                    <span class="nav-link-title">
                                        {{ $tag->name }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <hr>
                    <div class="pb-3 d-flex justify-content-between align-items-center">
                        <a href="#" class="ms-3" data-bs-toggle="modal" data-bs-target="#modal-team">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-plus">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 5l0 14" />
                                <path d="M5 12l14 0" />
                            </svg>
                            Add Project
                        </a>
                        <div class="d-flex">
                            <a href="#" class="ms-3" data-bs-toggle="modal" data-bs-target="#modal-tag">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-tag">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M7.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                    <path
                                        d="M3 6v5.172a2 2 0 0 0 .586 1.414l7.71 7.71a2.41 2.41 0 0 0 3.408 0l5.592 -5.592a2.41 2.41 0 0 0 0 -3.408l-7.71 -7.71a2 2 0 0 0 -1.414 -.586h-5.172a3 3 0 0 0 -3 3z" />
                                </svg>
                            </a>
                            <a href="#" class="ms-3" data-bs-toggle="modal" data-bs-target="#modal-folder">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-folder-plus">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 19h-7a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v3.5" />
                                    <path d="M16 19h6" />
                                    <path d="M19 16v6" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </aside>
        <div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Project</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('create.project') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                            <div class="row mb-3 align-items-end">
                                <div class="col">
                                    <label class="form-label">Folder</label>
                                    <select name="folder_id" class="form-control">
                                        <option value="">None</option>
                                        @foreach ($folders as $folder)
                                            <option value="{{ $folder->id }}">{{ $folder->name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control"
                                        placeholder="New project name" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-tag" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('create.tag') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                            <div class="row mb-3 align-items-end">
                                <div class="col">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control"
                                        placeholder="New tag name" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-blur fade" id="modal-folder" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Folder</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('create.folder') }}" method="POST">
                            @csrf
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            @endif
                            <div class="row mb-3 align-items-end">
                                <div class="col">
                                    <label class="form-label">Name</label>
                                    <input name="name" type="text" class="form-control"
                                        placeholder="New folder name" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($folders as $folder)
            <div class="modal modal-blur fade" id="folder-modal{{ $folder->id }}" tabindex="-1"
                aria-labelledby="folder-modal{{ $folder->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Folder</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Đóng"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update.folder', $folder->id) }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <input name="task_id" value="{{ $folder->id }}" hidden="">
                                <div class="row mb-3 align-items-end">
                                    <div class="col">
                                        <label class="form-label">Task Name</label>
                                        <input name="name" value="{{ $folder->name }}" type="text"
                                            class="form-control" placeholder="Tên thư mục mới" />
                                    </div>
                                </div>
                                <label class="form-label">Select Projects:</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($projectsWithoutFolder as $project)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="projects[]"
                                                    value="{{ $project->id }}" id="project-{{ $project->id }}"
                                                    {{ $folder->projects->contains($project->id) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="project-{{ $project->id }}">
                                                    {{ $project->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6">
                                        @foreach ($projects->filter(function ($project) use ($folder) {
                                                return $folder->projects->contains($project);
                                            }) as $project)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="projects[]"
                                                    value="{{ $project->id }}" id="project-{{ $project->id }}"
                                                    {{ $folder->projects->contains($project->id) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="project-{{ $project->id }}">
                                                    {{ $project->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Đóng</button>

                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                            <form class="modal-footer" action="{{route('folder.delete', $folder->id)}}" method="POST" >
                                @csrf
                                <button type="submit" class="btn btn-danger">Deleted</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="page-wrapper">
            <!-- Page header -->
            <header>
                <div class="px-3 py-2 text-bg-dark border-bottom d-none d-lg-block ">
                    <div class="container ">
                        <div
                            class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                            <a href="/"
                                class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
                                <svg class="bi me-2" width="40" height="32" role="img"
                                    aria-label="Bootstrap">
                                    <use xlink:href="#bootstrap" />
                                </svg>
                            </a>
                            <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">

                                <li>
                                    <a href="#" class="text-yellow nav-link text-white">
                                        PRE
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-timeline">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 16l6 -7l5 5l5 -6" />
                                            <path d="M15 14m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M10 9m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M4 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                            <path d="M20 8m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-bell">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                                        </svg>

                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('Account', ['id' => $user->id]) }}"
                                        class="nav-link text-white">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="#ffb8b8" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                                        </svg>
                                        <p>{{ $user->name }}</p>

                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </header>
            <div class="page-body d-print-none mt-5">

                @yield('content')
            </div>


        </div>
        <!-- Libs JS -->
    </div>
    <script src=" {{ asset('/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
    <script src=" {{ asset('/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
    <script src="{{ asset('dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
    <script src=" {{ asset('/dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>
    <!-- Tabler Core -->
    <script src="{{ asset('/dist/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('/dist/js/demo.min.js') }}" defer></script>

    <script src="{{ asset('/dist/libs/litepicker/dist/litepicker.js') }}" defer></script>

    <script>
        $(document).ready(function() {
            $('.toggle-btn').click(function() {
                $(this).closest('.row').find('.toggle-container .toggle-list').toggleClass('d-none');
            });
        });
    </script>

</body>

</html>
