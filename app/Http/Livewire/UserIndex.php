<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    public function render()
    {
        $users = User::paginate(10);
        $roles = User::with('roles')->get();
        return view('livewire.user-index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }
    public function userDelete($id) {

        permission_check('user-management');

        $user = User::findOrFail($id);
        $user->delete();
        flash()->addSuccess('User deleted successfully');
    }
}
