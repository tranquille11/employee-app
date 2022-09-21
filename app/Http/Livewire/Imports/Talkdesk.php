<?php

namespace App\Http\Livewire\Imports;

use App\Imports\TalkdeskCallsImport;
use App\Models\TalkdeskCall;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Talkdesk extends Component
{

    use WithFileUploads;

    public $file;
    public $calls;

    protected $rules = [
        'file' => 'required|file|mimes:csv,txt'
    ];


    public function render()
    {
        $this->calls = TalkdeskCall::orderByDesc('start_time')->take(30)->get();
        return view('livewire.imports.talkdesk')->extends('layouts.app');
    }

    public function import()
    {

        $this->validate();
        $this->file->storeAs('uploads-dismissable', 'calls-import.csv');

        $file = storage_path('app/uploads-dismissable/calls-import.csv');

        \session()->flash('info', 'Test');
        $import = new TalkdeskCallsImport;
        $import->import($file);


        $import->errorsOccurred > 0
            ? $this->getErrorBag()->add('import', "Some or all rows were not imported due to an error. Ensure that these requirements are met:")
            : \session()->flash('message', 'All calls were imported.');
        File::delete($file);
        $this->reset('file');

    }


    public function exportCSVTemplate()
    {
        return response()->download(storage_path('app/templates/talkdesk-template.csv'));
    }
}
