<?php

namespace App\Http\Livewire\Admin\Employees;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ListEmployees extends Component
{

    public Collection $selectedUsers;
    public Collection $users;

    public string $search = '';

    public string $sortField = 'name';
    public string $sortDirection = 'asc';

    public function mount()
    {
        $this->selectedUsers = new Collection([]);
    }


    public function render()
    {
        $this->users = User::search($this->search)->orderBy($this->sortField, $this->sortDirection)->get();

        return view('livewire.admin.employees.list-employees')->extends('layouts.app');
    }

    public function addUserToBulkAction(User $user): void
    {
        $currentUser = $this->selectedUsers->find($user);

        $currentUser ? $this->selectedUsers = $this->selectedUsers->except($currentUser->id) : $this->selectedUsers->push($user);
    }


    public function addAllUsersToBulkAction(): void
    {
        $notSelectedUsers = $this->users->diff($this->selectedUsers);

        $notSelectedUsers->isNotEmpty()
            ? $this->selectedUsers = $this->selectedUsers->concat($notSelectedUsers)->unique()
            : $this->selectedUsers = $this->selectedUsers->except($this->users->modelKeys());
    }

    public function sortVertically($sortDirection): void
    {
        $this->sortDirection = $sortDirection;
    }


}
