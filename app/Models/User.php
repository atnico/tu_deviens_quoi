<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'pseudo',
        'password',
        'email',
        'departement_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function quacks(){
        return $this->hasMany(Quacks::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // // je ccharge automatiquement l'utilisateur
    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function isAdmin(){
        return $this->role == "admin";
    }

}
