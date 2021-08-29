<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboardComponent extends Component
{
    public $home_menu = '';
    public $shop_menu = '';
    public $contact_menu = '';
    public $blog_menu = '';
    public $profile_menu = '';
    public $order_menu = 'active';

    public function render()
    {
        return view('livewire.user.user-dashboard-component')->layout('layouts.base', [
            'home_menu' => $this->home_menu,
            'shop_menu' => $this->shop_menu,
            'contact_menu' => $this->contact_menu,
            'blog_menu' => $this->blog_menu,
            'profile_menu' => $this->profile_menu,
            'order_menu' => $this->order_menu,
        ]);
    }
}
