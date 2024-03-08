<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['tasks_name','description','file','user_id'];

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'id');
    }

}

