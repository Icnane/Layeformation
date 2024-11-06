<?php

namespace App\Http\Controllers;

use App\Services\VideoConverter;
use Exception;

class VideoController extends Controller
{
    public function convert()
    {
        try {
            $inputVideoPath = 'chemin/vers/la/vidéo/originale.avi';
            $outputVideoPath = 'chemin/vers/la/vidéo/convertie.mp4';

            $convertedVideoPath = VideoConverter::convertToMp4($inputVideoPath, $outputVideoPath);
            return "Vidéo convertie avec succès : $convertedVideoPath";
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
