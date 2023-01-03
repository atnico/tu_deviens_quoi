<?php

namespace App\Models;

use App\Http\Controllers\Quack;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['content', 'image', 'tags', 'quack_id', 'user_id'];

    public function quack()
    {
        return $this->belongsTo(Quack::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
