<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory; 

    protected $fillable = ['titre', 'chapitre_id','options']; 

   
    
    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }

   
     
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

   
   
    public function options()
    {
        return $this->hasManyThrough(Option::class, Question::class);
    }
}
