<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Registers extends Model
{
    use HasFactory;

    protected $table = 'registers';

    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'sexe',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}