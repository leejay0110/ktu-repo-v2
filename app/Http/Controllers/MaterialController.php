<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        return view('pages.material.index');
    }

    function search(Request $request)
    {

        request()->validate([
            'query' => 'required'
        ], [
            'query.required' => 'Please enter a search.'
        ]);
        
        $materials = Material::where('course_title', 'like', '%' . $request['query'] . '%')
            ->orwhere('course_code', 'like', '%' . $request['query'] . '%')
            ->orwhere('lecturer', 'like', '%' . $request['query'] . '%')
            ->limit(10)->get();


        if ( $request->ajax() )
        {
            return view('pages.material.search', [
                'materials' => $materials
            ]);
        }

        return back();

    }


    public function show(Material $material)
    {
        return view('pages.material.show', [
            'material' => $material
        ]);
    }

    
    public function user(User $user)
    {
        
        if ( $user->roles->pluck('name')->contains('cm upload') ) {
            return view('pages.material.user', [
                'user' => $user
            ]);
        }
        abort(404);

    }

}
