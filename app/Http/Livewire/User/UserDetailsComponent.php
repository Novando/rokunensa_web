<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Auth;

class UserDetailsComponent extends Component
{
    public $home_menu = '';
    public $shop_menu = '';
    public $contact_menu = '';
    public $blog_menu = '';
    public $profile_menu = 'active';
    public $order_menu = '';
    public $first_name;
    public $last_name;
    public $address1;
    public $address2;
    public $city;
    public $country;
    public $zip;
    public $phone;

    public function mount(){
        $profile = UserDetail::where('username', Auth::user()->username)->first();
        $this->first_name = $profile->first_name;
        $this->last_name = $profile->last_name;
        $this->address1 = $profile->address_line_1;
        $this->address2 = $profile->address_line_2;
        $this->city = $profile->city;
        $this->country = $profile->country;
        $this->zip = $profile->zip;
        $this->phone = $profile->phone;
    }

    public function saveProfile(){
        $id_search = UserDetail::where('username', Auth::user()->username)->first();
        $profile = UserDetail::find($id_search->id);
        $phone_check = UserDetail::where('phone', $this->phone);
        if ($phone_check->count() == 0 || $phone_check->first()->username == $id_search->username) {
            $profile->update([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'address_line_1' => $this->address1,
                'address_line_2' => $this->address2,
                'city' => $this->city,
                'country' => $this->country,
                'zip' => $this->zip,
                'phone' => $this->phone
            ]);
            session()->flash('message', 'Profile saved!');
        } else {
            session()->flash('message', 'Phone number already registered!');
        }
    }

    public function render()
    {
        return view('livewire.user.user-details-component', [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'country' => $this->country,
            'zip' => $this->zip,
            'phone' => $this->phone
        ])->layout('layouts.base', [
            'home_menu' => $this->home_menu,
            'shop_menu' => $this->shop_menu,
            'contact_menu' => $this->contact_menu,
            'blog_menu' => $this->blog_menu,
            'profile_menu' => $this->profile_menu,
            'order_menu' => $this->order_menu
        ]);
    }
}
