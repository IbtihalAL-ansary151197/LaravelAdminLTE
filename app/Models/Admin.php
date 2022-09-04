<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Authenticatable
{
    // use HasFactory;
    // use  HasFactory, Notifiable;

    protected $table = 'admins';
    protected $fillable = [
        'name',
        'email',
        'photo',
        'password',
        'is_admin',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        
    ];

}
