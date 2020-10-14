<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Paper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaperController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.user');
        $this->middleware('check.approval');
        $this->middleware('check.active.status');
        $this->middleware('pep.upload');

    }

    public function index()
    {
        return view('dashboard.user.papers.index');
    }


    public function create()
    {
        return view('dashboard.user.papers.create');
    }


    function store(Request $request)
    {
        $credentials = $request->validate([
            'course_title' => 'required',
            'course_code'  => 'required',
            'year'         => 'required',
            'examiner'     => 'required',
            'semester'     => 'required',
        ]);

        $request->validate([
            'paper' => 'required|file|mimes:pdf'
        ], [
            'paper.required' => 'Please select a file to upload',
            'paper.mimes' => 'The file must be of type: pdf.',
            'paper.file' => 'The document must be a file'
        ]);
        
        
        if ($request->hasFile('paper')) {

            $filename = Str::random(40) . ".{$request->paper->getClientOriginalExtension()}";
            $path = $request->paper->storeAs("public/papers", $filename);

            $credentials['filename'] = "$request->course_title ($request->course_code) $request->year Sem-$request->semester ($request->examiner).{$request->paper->getClientOriginalExtension()}";
            $credentials['path'] =$path;

            Auth::user()->papers()->create($credentials);

            return redirect()->route('user.papers')->with('success', 'Past exam paper added successfully.');
        
        }
    }


    public function show(Paper $paper)
    {
        $this->authorize('view', $paper);
        return view('dashboard.user.papers.show', ['paper' => $paper]);
    }


    function update(Request $request, Paper $paper)
    {

        $this->authorize('update', $paper);

        $data = $request->validate([
            'course_code'  => 'required|min:3',
            'course_title' => 'required|min:3',
            'examiner'     => 'required|min:3',
            'year'         => 'required',
            'semester'     => 'required'
        ]);
        
        $paper->course_title = $data['course_title'];
        $paper->course_code = $data['course_code'];
        $paper->examiner = $data['examiner'];
        $paper->year = $data['year'];
        $paper->semester = $data['semester'];
        $paper->save();

        return redirect()->route('user.papers.show', $paper)->with('success', 'Past exam paper updated successfully.');
        
    }


    function destroy(Paper $paper)
    {

        $this->authorize('delete', $paper);

        Storage::delete($paper->path);
        $paper->delete();

        return redirect()->route('user.papers', )->with('success', 'Past exam paper deleted successfully.');
        
    }

}
