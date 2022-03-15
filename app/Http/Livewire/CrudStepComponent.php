<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Step;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrudStepComponent extends Component
{
    use WithFileUploads;

    public Activity $activity;
    public Step|null $step = null;
    public $title, $duration, $image;

    protected $listeners = ['openStep', 'refresh' => '$refresh', 'addAudioUrl'];

    public function mount()
    {
        $this->step = Step::where('activity_id', $this->activity->id)->orderBy('position', 'ASC')->first();

        (!$this->step) ? $this->newStep() : $this->fillStepData();

        $this->emit('selectedStepIdOnMount', $this->step->id);

    }

    public function render()
    {
        return view('livewire.crud-step-component');
    }

    public function updatedTitle()
    {
        $this->validation(['title']);
        $this->saveCurrentStep();
    }

    public function updatedTime()
    {
        $this->validation(['duration']);
        $this->saveCurrentStep();
    }

    public function updatedImage()
    {
        $this->validation(['image']);
        $this->saveCurrentStep();
    }

    public function newStep()
    {
        if ($this->step) {
            $this->validation();
            $this->saveCurrentStep();
        }

        $this->step = Step::query()
            ->create([
                'activity_id' => $this->activity->id,
                'position' => Step::where('activity_id', $this->activity->id)->max('position') + 1
            ]);
        [$this->title, $this->duration, $this->image] = null;

        $this->emit('startElement', $this->step);
    }

    public function fillStepData()
    {
        $this->title = $this->step->title;
        $this->duration = $this->step->seconds;
        $this->image = null;
    }

    public function saveCurrentStep()
    {
        $step = $this->step;

        $step->title = $this->title;
        $step->seconds = $this->duration;
        if ($this->image) {
            $step->image_url = $this->image?->store('images', 'public');
        }

        $step->save();

        $this->step = $step;

        $this->emit('refreshStep', $step);
    }

    public function openStep(Step $step)
    {
        $this->emit('refresh');
        $this->saveCurrentStep();
        $this->step = $step;
        $this->fillStepData();
    }

    public function validation(array $array = null)
    {
        $validationArray = [];

        if (!$array) {
            if ($this->step->image_url) {
                $this->validate([
                    'title' => 'required',
                    'duration' => 'required',
                ]);
            } else {
                $this->validate([
                    'title' => 'required',
                    'duration' => 'required',
                    'image' => 'required|image'
                ]);
            }
        } else {
            in_array('title', $array) ? $validationArray['title'] = 'required' : null;
            in_array('duration', $array) ? $validationArray['duration'] = 'required' : null;
            if (!$this->step->image_url) {
                in_array('image', $array) ? $validationArray['image'] = 'required|image' : null;
            }
        }

        if (!empty($validationArray)) {
            $this->validate($validationArray);
        }
    }

    public function addAudioUrl($url)
    {
        $this->step->audio_url = $url;
        $this->saveCurrentStep();
    }
}
