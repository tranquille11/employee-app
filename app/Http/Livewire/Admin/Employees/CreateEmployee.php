<?php

namespace App\Http\Livewire\Admin\Employees;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Tags\Tag;

class CreateEmployee extends Component
{

    use WithFileUploads;

    // Main user fields
    public string $name;
    public string $email;
    public string $phone;
    public string $password;


    // Related address table to user
    public string $address;
    public string $country;
    public string $city;
    public string $region;
    public string $postal;

    // Related role table to user
    public string $role;

    // Related team table to user
    public int $team;

    // Media related table
    public $governmentId;
    public $resume;


    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|min:8',
        'password' => 'required|min:8',
        'address' => 'required|min:10',
        'country' => 'required',
        'city' => 'required',
        'region' => 'required',
        'postal' => 'required|min:5',
        'role' => 'required',
        'governmentId' => 'required|mimetypes:image/jpg,image/jpeg,image/png',
        'resume' => 'required|mimetypes:application/pdf'
    ];

    public function render()
    {

        return view('livewire.admin.employees.create-employee')->extends('layouts.app');
    }

    public function mount()
    {
        $this->fill([
            'name' => '', 'email' => '', 'phone' => '', 'password' => '',
            'address' => '', 'country' => 'Romania', 'city' => '', 'region' => '', 'postal' => '',
            'role' => '',
            'team' => 0,
            'tags' => collect([]),
            ]);

    }


    public function store()
    {

        $this->validate();

        // Create user
        $user = User::create([
           'name' => trim($this->name),
           'email' => trim($this->email),
           'phone_number' => trim($this->phone),
           'password' => Hash::make(trim($this->password))
        ]);

        // Create user address with relationship
        $user->address()->create([
            'street_address' => trim($this->address),
            'city' => trim($this->city),
            'country' => trim($this->country),
            'region' => trim($this->region),
            'postal_code' => trim($this->postal),
        ]);

        $govIdFileName = 'gov_id_' . str_replace(' ', '_', $this->name) . '_' . time() . '.' . $this->governmentId->extension();
        $resumeFileName = 'CV_' . str_replace(' ', '_', $this->name) . '_' . time() . '.' . $this->resume->extension();

        // Upload attachments
        $user->addMedia($this->governmentId->getRealPath())->usingFileName($govIdFileName)->toMediaCollection('image');
        $user->addMedia($this->resume->getRealPath())->usingFileName($resumeFileName)->toMediaCollection('others');

        // Assign role
        $user->assignRole($this->role);

        // Assign team
        $user->assignTeam($this->team);
    }

}
