<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.user');
        $this->middleware('check.approval');
        $this->middleware('check.active.status');
        $this->middleware('cm.upload');

    }

    public function index()
    {
        return view('dashboard.user.materials.index');
    }


    function create()
    {
        return view('dashboard.user.materials.create');
    }


    function store(Request $request)
    {
        
        $credentials = $request->validate([
            'course_code' => 'required|min:3|max:10',
            'course_title' => 'required|min:3',
            'lecturer' => 'required|min:3',
            'files' => 'sometimes'
        ]);
        
        $credentials['folder'] = "materials/" . uniqid('cm_');
        $material = Auth::User()->materials()->create($credentials);


        if ($request->hasFile('files')) {

            foreach ($request->file('files') as $file) {

                $filename = Str::random(40) . ".{$file->getClientOriginalExtension()}";
                $path = $file->storeAs("public/{$material->folder}", $filename);

                $material->files()->create([
                    'filename' => $file->getClientOriginalName(),
                    'path' => $path
                ]);

            }
            
        }

        return redirect()->route('user.materials.show', $material)->with('success', 'Material successfully created.');
        
    }

    function show(Material $material)
    {
        $this->authorize('view', $material);
        return view('dashboard.user.materials.show', ['material' => $material]);
    }


    function update(Request $request, Material $material)
    {
        $this->authorize('update', $material);

        $data = $request->validate([
            'course_title' => 'required|min:3',
            'course_code' => 'required|min:3|max:20',
            'lecturer' => 'required'
        ]);
        
        $material->course_title = $data['course_title'];
        $material->course_code = $data['course_code'];
        $material->lecturer = $data['lecturer'];
        $material->save();

        return back()->with('success', 'Course material updated successfully.');
        
    }


    public function destroy(Material $material)
    {
        $this->authorize('delete', $material);
        
        $material->delete();
        Storage::deleteDirectory('public/' . $material->folder);
        
        return redirect()->route('user.materials')->with('success', 'Course material successfully deleted.');

    }

}