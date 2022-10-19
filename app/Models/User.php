<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $guarded = [];
    protected $fillable = [
        'firstname', 'lastname', 'adress', 'phone', 'email', 'password', 'type'
    ];

    /**
     * Guarded is the reverse of fillable. 
     * If fillable specifies which fields to be mass assigned, 
     * guarded specifies which fields are not mass assignable. So in the model:
     */
     /* protected $guarded = [];
        protected $filleable=['nom', 'prenom','profil', 'ville', 'tel', 'email', 'password'];
    * /

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
}
