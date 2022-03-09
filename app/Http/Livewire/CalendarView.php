<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Support\Collection;
use Livewire\Component;

class CalendarView extends Component
{
    public Collection|null $patients;

    public function mount()
    {
        $this->patients = Patient::all();
    }

    public function render()
    {
        return view('livewire.calendar-view');
    }
}
