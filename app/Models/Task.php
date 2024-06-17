<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'quantity_podomoro',
        'due_date_at',
        'user_id',
        'project_id',
        'folder_id',
        'priority',
        'note',
    ];

    public function updateTask($data, $id)
    {
        return DB::table('tasks')->where('id', $id)->update($data);

    }

    public function getDeadlineCommonFormat()
    {
        return $this->due_date_at->format('d M');
    }

    public function isCompleted()
    {
        return $this->completed_at !== null;
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_tasks', 'task_id', 'tag_id');
    }


    public  function getPriorityLabel(){
        return match ($this->priority){
            'no' => 'No Priority',
            'low' => 'Low Priority',
            'medium' => 'Medium Priority',
            'high' => 'High Priority',
        };
    }



    public  function getPriorityColor(){
        return match ($this->priority){
            'no' => '#b8b7b7',
            'low' => '#02d96a',
            'medium' => '#f6ee04',
            'high' => '#fd2b2b',
        };
    }

    public  function getPriorityColorFromKey($key){
        return match ($key){
            'no' => '#b8b7b7',
            'low' => '#02d96a',
            'medium' => '#f6ee04',
            'high' => '#fd2b2b',
        };
    }

}
