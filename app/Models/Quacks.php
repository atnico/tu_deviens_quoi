<?php

namespace App\Models;

use App\Models\Comments;
use Illuminate\Foundation\Auth\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Quacks extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'image', 'tags', 'user_id'];


    // nom au pluriel car un message peut regrouper plusieurs commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}




 

 

 


