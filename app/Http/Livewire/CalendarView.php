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
        $this->patients = Patient::query()
            ->with(['activitiesPatients', 'activitiesPatients.activity'])
            ->get();

        $this->timeslots = $this->getTimeslots();
    }

    public function render()
    {
        return view('livewire.calendar-view');
    }

    public function getTimeslots()
    {
        return [
            '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00'
        ];
    }
}
