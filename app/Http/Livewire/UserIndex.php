<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::where('name', '!=', 'Super Admin')->with('roles')->get();

        return view('livewire.user-index', [
            'users' => $users
        ]);
    }

    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        flash()->addSuccess('User Deleted Successfully.');
    }
}
