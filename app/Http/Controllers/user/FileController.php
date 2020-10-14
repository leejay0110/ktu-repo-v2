<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Material;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function PHPUnit\Framework\isEmpty;

class FileController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.user');
        $this->middleware('check.approval');
        $this->middleware('check.active.status');
    }


    function upload(Material $material)
    {
        request()->validate([
            'files' => 'required'
        ]);

        foreach (request()->file('files') as $file) {


            $filename = Str::random(40) . ".{$file->getClientOriginalExtension()}";
            $path = $file->storeAs("public/{$material->folder}", $filename);

            $material->files()->create([
                'filename' => $file->getClientOriginalName(),
                'path' => $path
            ]);

        }

        return redirect()->back()->with('success', 'Upload completed successfully');

    }



    function destroy(File $file)
    {

        $this->authorize('delete', $file);

        Storage::delete($file->path);
        $file->delete();
        
        return redirect()->back()->with('success', 'File deleted successfully');

    }
}
