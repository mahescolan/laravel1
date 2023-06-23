<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class register extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table="register";
    protected $guard="register";
   
    protected $fillable=['name','email','password',];
}
