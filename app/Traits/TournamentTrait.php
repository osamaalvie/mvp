<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 3:06 PM
 */

namespace App\Traits;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

trait TournamentTrait
{
    public $filePath = "";
    public $fileprefix = "";
    public $failedPath = "";
    public $processedPath = "";
    public $mvpPath = "";

    public function getFiles($path)
    {
        return File::glob($path);
    }

    public function isValidHeaders($file, $requiredHeaders)
    {
        $f = fopen($file, 'r');
        $firstLine = fgets($f); //get first line of csv file
        fclose($f); // close file

        $foundHeaders = str_getcsv(trim($firstLine), ',', '"'); //parse to array

        if ($foundHeaders !== $requiredHeaders) {
            Log::debug('Headers do not match: ' . implode(', ', $foundHeaders));
            return false;
        }

        return true;
    }

    public function moveFile($sourceFile, $destPath)
    {

        rename($sourceFile, $destPath . DIRECTORY_SEPARATOR . pathinfo($sourceFile, PATHINFO_BASENAME));
    }

}