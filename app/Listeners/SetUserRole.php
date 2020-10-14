<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use App\Models\Role;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetUserRole
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(NewUserRegistered $event)
    {

        switch ($event->role) {
            case 'pep upload':
                
                $role = Role::where('name', 'pep upload')->firstOrFail();
                $event->user->roles()->attach($role->id);
                break;

            case 'cm upload':
                
                $role = Role::where('name', 'cm upload')->firstOrFail();
                $event->user->roles()->attach($role->id);
                break;
            
            default:
                break;
        }
    }
}
