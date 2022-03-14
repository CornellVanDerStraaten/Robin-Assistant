<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Step;
use Illuminate\Support\Collection;
use Livewire\Component;

class SortableStepsComponent extends Component
{
    public Activity $activity;
    public $steps;
    public $selectedStepId;
    public $first = true;

    protected $listeners = ['refreshStep', 'startElement', 'selectedStepIdOnMount' => 'setSelected'];

    public function render()
    {
        $this->steps = Step::where('activity_id', $this->activity->id)->orderBy('position')->get();

        if ($this->first && count($this->steps) != 0) {
            $this->selectStep($this->steps->first()->id);
            $this->first = false;
        }

        return view('livewire.sortable-steps-component', [
            'steps' => $this->steps
        ]);
    }

    public function startElement($step)
    {
        $this->render();
    }

    public function setSelected($stepId)
    {
        $this->selectedStepId = $stepId;
    }

    public function selectStep($stepId)
    {
        $this->selectedStepId = $stepId;
        $this->emit('openStep', $this->steps->where('id', $stepId));
    }

    public function refreshStep(Step $step)
    {
        $this->steps[$step->id] = $step;
    }

    public function updateTaskOrder($list)
    {
        foreach ($list as $item) {
            Step::find($item['value'])->update(['position' => $item['order']]);
        }
    }
}
