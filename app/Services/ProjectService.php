<?php


namespace App\Services;

use App\Models\Project;



final class ProjectService
{

    public function createProject(int $userId ,string $name,?int $folderID): Project
    {
        $project = Project::create([
            'user_id' => $userId,
            'name' => $name,
            'folder_id' => $folderID,

        ]);
        return $project;
    }
}
