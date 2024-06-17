<?php


namespace App\Services;

use App\Models\Tag;



final class TagService
{

    public function createTag(int $userId ,string $name,): Tag
    {
        $tag = Tag::create([
            'user_id' => $userId,
            'name' => $name,


        ]);
        return $tag;
    }
}
