<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'folder_id'
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function folder() {
        return $this->belongsTo(Folder::class);
    }
    use HasFactory;
}
