<?php

namespace App\Http\Livewire;

use App\Models\ActivitiesPatients;
use App\Models\Activity;
use App\Models\Patient;
use Livewire\Component;

class StepComponent extends Component
{
    public Activity $activity;

    protected $listeners = ['notAllStepsFilled', 'checkIfRedirectAllowed'];

    public function render()
    {
        return view('livewire.step-component');
    }

    public function checkSteps()
    {
        $this->emit('validateAllSteps');
    }

    public function notAllStepsFilled()
    {
        $this->addError('steps', 'Please fill all steps before continuing');
    }

    public function checkIfRedirectAllowed()
    {
        if (!$this->getErrorBag()->has('steps')) {
            // TODO: set correct redirect
            $patients = Patient::all();

            $this->activity->title = 'Activiteit test';
            $this->activity->save();

            foreach ($patients as $patient) {
                ActivitiesPatients::create([
                    'activity_id' => $this->activity->id,
                    'patient_id' => $patient->id,
                    'timeslot' => rand(0, 5)
                ]);
            }

            return redirect()->route('dashboard');
        }
    }
}
