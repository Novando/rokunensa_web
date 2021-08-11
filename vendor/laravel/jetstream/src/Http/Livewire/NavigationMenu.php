<?php

namespace Laravel\Jetstream\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetail;

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
        $user = UserDetail::where('username', Auth::user()->username)->first()->username;
        $status = User::where('username', Auth::user()->username)->first()->utype;
        switch ($status) {
            case 'ADM':
                $rank = 'Administrator';
                break;
            
            default:
                $rank = 'Undefined';
                break;
        }
        return view('navigation-menu', [
            'user' => $user,
            'rank' => $rank
        ]);
    }
}
