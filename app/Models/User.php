<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class user extends Authenticatable
{
    use HasApiTokens, Notifiable;

        protected $fillable = [
            'name',
            'email',
            'password',
        ];
    }
    // Les attributs et méthodes du modèle User





