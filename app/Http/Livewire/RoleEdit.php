<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleEdit extends Component
{
    public $roleId;
    public $name;
    public $selectedPermissions = [];

    public function mount()
    {
        $role = Role::findOrFail($this->roleId);
        $this->name = $role->name;
        foreach ($role->permissions as $key => $permission) {
            $this->selectedPermissions[$key] = $permission->name;
        }
    }

    public function render()
    {
        return view('livewire.role-edit', [
            'permissions' => Permission::all()
        ]);
    }

    protected $rules = [
        'name' => 'required',
        'selectedPermissions' => 'required|array|min:1',
    ];

    public function updateRole()
    {
        $this->validate();

        $role = Role::findOrFail($this->roleId);

        $role->update(['name' => $this->name]);
        $role->syncPermissions($this->selectedPermissions);

        flash()->addSuccess('Role updated successfully');
        return redirect()->route('role.index');
    }
}
