<?php
/*
 * This file is part of the Request Platform package.
 *
 * (c) Tran The Hien <hientt53@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Services;

use App\Models\Task;

/**
 * App\Services\AuthService
 */
final class TaskService
{
    public function createTask(int $userId,string $name, int $quantityPodomoro, string $dueDate, ?int $projectId,?int $folderId,string $priority = 'no' ): Task
    {
        $task = Task::create([
            'user_id' => $userId,
            'name' => $name,
            'quantity_podomoro' => $quantityPodomoro,
            'due_date_at' => $dueDate,
            'project_id' => $projectId,
            'folder_id' => $folderId,
            'priority' => $priority,
        ]);

        return $task;
    }
    public function completedTask( $id ): Task
    {
        $task = Task::where('id', $id)->first();
        $task->completed_at = now();
        $task->save();

        return $task;
    }
    public function cancelCompletedTask($id): Task
    {
        $task = Task::where('id', $id)->first();
        $task->completed_at = null;
        $task->save();

        return $task;
    }
}
