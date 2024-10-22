<?php

// app/Models/Resource.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text_content', 'video_path', 'module_id', 'chapitre_id'];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function chapitre()
    {
        return $this->belongsTo(Chapitre::class);
    }
}
