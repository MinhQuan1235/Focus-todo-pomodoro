<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Task;

class EditTaskComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $task;
    public  $tags;
    public  $projects;

    public function __construct($task, $tags, $projects)
    {
        $this->task = $task;
        $this->tags = $tags;
        $this->projects = $projects;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.edit-task-component');
    }
}
