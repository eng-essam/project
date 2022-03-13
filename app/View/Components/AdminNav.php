<?php

namespace App\View\Components;

use App\Models\Union;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminNav extends Component
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
        $data['user'] = Auth::user();
        if ($data['user']) {
            $data['union'] = Union::findOrfail($data['user']->union_id);
            return view('components.admin-nav')->with($data);
        }
    }
}
