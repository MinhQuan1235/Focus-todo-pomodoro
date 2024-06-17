<?php


namespace App\Services;

use App\Models\Folder;



final class FolderService
{

    public function createFolder(int $userId ,string $name): Folder
    {
        $folder = Folder::create([
            'user_id' => $userId,
            'name' => $name,

        ]);

        return $folder;
    }
}
