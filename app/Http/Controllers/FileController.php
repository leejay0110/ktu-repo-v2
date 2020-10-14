<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Material;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class FileController extends Controller
{
    public function downloadPaper(Paper $paper)
    {
        return Storage::download( $paper->path, $paper->filename , [ 'Content-Type' => Storage::mimeType($paper->path)] );
    }

    public function downloadFile(File $file)
    {
        return Storage::download( $file->path, $file->filename , [ 'Content-Type' => Storage::mimeType($file->path)] );
    }

    public function downloadZip(Material $material)
    {
        
        $zip = new ZipArchive();
        $tmp_file = tempnam(sys_get_temp_dir() , env('APP_NAME'));
        $zip->open($tmp_file, ZipArchive::CREATE);

        foreach ( $material->files as $file )
        {          
            $download_file = file_get_contents( storage_path('app/' . $file->path) );
            $zip->addFromString( $file->filename , $download_file );
        }

        $zip->close();
        return response()->download(
            $tmp_file,
            "{$material->course_title} - {$material->course_code}.zip",
            [ 'Content-Type' => 'application/zip'] 
        );

        

    }
}
