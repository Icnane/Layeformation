<?php

namespace App\Services;

use Exception;

class VideoConverter
{
    public static function convertToMp4($inputPath, $outputPath)
    {
        $ffmpeg = "/usr/bin/ffmpeg"; // Chemin de FFmpeg, ajuste-le si nécessaire
        $command = "$ffmpeg -i $inputPath -vcodec libx264 -acodec aac $outputPath";
        exec($command, $output, $returnVar);

        if ($returnVar === 0) {
            return $outputPath;
        } else {
            throw new Exception("Erreur lors de la conversion de la vidéo.");
        }
    }
}
 
