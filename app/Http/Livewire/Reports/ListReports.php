<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;

class ListReports extends Component
{

    public function render()
    {
        return view('livewire.reports.list-reports')->extends('layouts.app');
    }
}
