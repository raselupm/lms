<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    public function render()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return view('livewire.role-index', [
            'roles' => $roles
        ]);
    }

    public function roleDelete($id)
    {
        $role = Role::find($id);
        $role->delete();

        flash()->addSuccess('Role Deleted Successfully.');
    }
}
