<?php

namespace App\View\Components;
use App\Models\Union;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\View\Component;

class membernav extends Component
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
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data['unions'] = Union::select('id', 'name')->get();

        $loggedUser = Auth::user();
        if ($loggedUser) {
            $data['union'] = Union::findOrfail($loggedUser->union_id);
            $data['servicess'] = $data['union']->services;

            $user = User::findOrfail($loggedUser->id);
            $data['myservice'] = $user->services;
        }

        return view('components.membernav')->with($data);
    }
}
