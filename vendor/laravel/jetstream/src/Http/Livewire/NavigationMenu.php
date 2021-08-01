<?php

namespace Laravel\Jetstream\Http\Livewire;

use Livewire\Component;
use App\Models\UserDetail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NavigationMenu extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $account = User::where('username', Auth::user()->username)->first();
        $detail = UserDetail::where('username', Auth::user()->username)->first();
        return view('navigation-menu', [
            'account' => $account,
            'detail' => $detail
        ]);
    }
}
