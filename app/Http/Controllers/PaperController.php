<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    public function index()
    {
        return view('pages.paper.index');
    }


    function search(Request $request)
    {

        request()->validate([
            'query' => 'required'
        ], [
            'query.required' => 'please enter a search.'
        ]);

        $papers = Paper::where('course_title', 'like', '%' . $request['query'] . '%')
            ->orwhere('course_code', 'like', '%' . $request['query'] . '%')
            ->orwhere('examiner', 'like', '%' . $request['query'] . '%')
            ->limit(20)->get();

        
        if ( $request->ajax() )
        {
            return view('pages.paper.search', [
                'papers' => $papers
            ]);
        }
            
        return back();


    }
}
