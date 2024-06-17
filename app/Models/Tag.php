<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
    ];
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'tags_tasks', 'tag_id', 'task_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
