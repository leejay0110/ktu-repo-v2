<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class MaterialSidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $users = User::whereHas('roles', function($q){
            $q->whereIn('roles.name', ['cm upload']);   
        })->get();

        return view('components.material-sidebar', [
            'users' => $users
        ]);
    }
}
