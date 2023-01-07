<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $user_id;
    public $name;
    public $email;
    public $password;
    public $role;

    public function mount()
    {
        $user = User::where('id', $this->user_id)->with('roles')->first();
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->roles[0]->id;
    }

    public function render()
    {
        $user = User::where('id', $this->user_id)->with('roles')->first();
        $roles = Role::all();
        return view('livewire.user-edit', [
            'user' => $user,
            'roles' => $roles
        ]);
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
        'role' => 'required',
    ];

    public function updateUser()
    {
        $user = User::findOrFail($this->user_id);

        $this->validate();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = $this->password;
        $user->save();

        $user->syncRoles($this->role);
        flash()->addSuccess('User updated successfully');

        return redirect()->route('user.index');
    }
}
