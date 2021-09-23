<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Kasir extends Authenticatable
{
    protected $table = 'kasirs';
    protected $fillable = ['name', 'email', 'password'];
}
