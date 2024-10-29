<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text_content',
        'video_path',
        'module_id',
        'chapitre_id',
    ];

    // Relation avec le module
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    // Relation avec le chapitre
    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }
}
