<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Step;
use Livewire\Component;

class CrudStepComponent extends Component
{
    public Activity $activity;
    public $openedStep = null;
    public $title, $time, $image;

    public function mount()
    {
        if (!$this->openedStep) {
            $this->newStep();
        }
    }

    public function render()
    {
        return view('livewire.crud-step-component');
    }

    public function updatedTitle()
    {
        dd('test');
        $this->saveCurrentStep();
    }

    public function updatedTime()
    {
        $this->saveCurrentStep();
    }

    public function updatedImage()
    {
        $this->saveCurrentStep();
    }

    public function newStep()
    {
        $this->validateCurrentStep();
        $this->saveCurrentStep();

        $this->title = null;
        $this->time = null;
        $this->image = null;
    }

    public function validateCurrentStep()
    {
        $this->validate([
            'title' => 'required'
        ]);
    }

    public function saveCurrentStep()
    {
        $step = Step::query()
            ->updateOrCreate([
                'activity' => $this->activity->id,
                ''
        ]);

        $this->openedStep = $step;
    }
}
