<?php

namespace App\Http\Livewire;

use App\Models\Activity;
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
            return redirect()->route('dashboard');
        }
    }
}
