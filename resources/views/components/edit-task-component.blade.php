<div>
        <form action="{{ route('task.completed', $task->id) }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label class="form-label col-12 col-md-4">Mark Completed</label>
                <div class=" col-12 col-md-8">
                    <button class="form-check-input" type="checkbox"></button>
                </div>
            </div>
        </form>
        <form action="{{ route('task.update', ['id' => $task->id]) }}" method="POST">
            @csrf
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <input name="task_id" value="{{ $task->id }}" type="hidden">
            <div class=" row mb-3">
                <label class="form-label col-12 col-md-4">Task Name</label>
                <div class=" col-12 col-md-8">
                    <input name="taskname" value="{{ $task->name }}" type="text"
                           class="form-control" placeholder="Tên thư mục mới" />
                </div>
            </div>
            <div class="row mb-3 d-flex align-items-center">

                <label class="form-label col-12 col-md-4">
                    Priority
                </label>

                <div class="form-selectgroup col-12 col-md-8">
                    @php
                        $priorities = [
                            'no' => 'No ',
                            'low' => 'Low ',
                            'medium' => 'Medium',
                            'high' => 'High ',
                        ];
                    @endphp
                    @foreach ($priorities as $value => $label)
                        <label class="form-selectgroup-item ">
                            <input type="radio" name="priority" value="{{ $label }}"
                                   class="form-selectgroup-input"
                                {{ $task->priority === $value ? 'checked' : '' }} />
                            <span class="form-selectgroup-label">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                             height="24" viewBox="0 0 24 24"
                                                             fill="{{ $task->getPriorityColorFromKey($value) }}"
                                                             class="icon icon-tabler icons-tabler-filled icon-tabler-flag">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M4 5a1 1 0 0 1 .3 -.714a6 6 0 0 1 8.213 -.176l.351 .328a4 4 0 0 0 5.272 0l.249 -.227c.61 -.483 1.527 -.097 1.61 .676l.005 .113v9a1 1 0 0 1 -.3 .714a6 6 0 0 1 -8.213 .176l-.351 -.328a4 4 0 0 0 -5.136 -.114v6.552a1 1 0 0 1 -1.993 .117l-.007 -.117v-16z" />
                                                        </svg>
                                                        {{ $label }}</span>
                        </label>
                    @endforeach

                </div>


            </div>

            <div class="row mb-3 d-flex align-items-center">

                <label class="form-label col-12 col-md-4">Due Date</label>
                <div class=" col-12 col-md-8">
                    <input style="" class="form-control datepicker-icon-edit"
                           placeholder="Select a date"
                           value="{{ $task->due_date_at ? \Carbon\Carbon::parse($task->due_date_at)->format('Y-m-d') : '' }}"
                           name="select_date" id="datepicker-icon-edit-{{ $task->id }}"
                           onclick="editDatePicker({{ $task->id }})">

                </div>
            </div>

            <div class="row mb-3 d-flex align-items-center">
                <label class="form-label col-12 col-md-4">Tags input</label>

                <div class="col-12 col-md-8">
                    <select class="select-beast" placeholder="Select a tags..." autocomplete="on"
                            multiple class="form-select" name="tags[]">
                        <option value="">Select a person...</option>
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ $task->tags->contains($tag->id) ? 'selected' : '' }}>
                                {{ $tag->name }}</option>
                        @endforeach
                    </select>

                </div>

            </div>

            <div class="row mb-3 d-flex align-items-center">
                <label class="form-label col-12 col-md-4">Pomodoro Quantity</label>
                <div class="col-12 col-md-8">
                    <select name="quantity_podomoro" class="form-control  link-secondary ">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}"
                                {{ $i == $task->quantity_podomoro ? 'selected' : '' }}>
                                {{ $i }}</option>
                        @endfor
                    </select>
                </div>

            </div>

            <div class="row mb-3 d-flex align-items-center">
                <label class="form-label col-12 col-md-4">Project</label>
                <div class="col-12 col-md-8">
                    <select name="project_id" class="form-control link-secondary mb-3">
                        <option value="">Tasks</option>
                        @if (!empty($projects))
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ old('project_id') == $project->id || $task->project_id == $project->id ? 'selected' : false }}>
                                    {{ $project->name }}</option>
                            @endforeach
                        @endif

                    </select>
                </div>
            </div>

            <div class="mb-3 row">
                <label class="form-label col-12 col-md-4">Textarea</label>
                <div class="col-12 col-md-8">
                    <textarea class="form-control" name="note" placeholder="Add note..  " rows="6">{{$task->note}}</textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>


</div>

