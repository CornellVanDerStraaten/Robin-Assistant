<?php

namespace App\Http\Livewire;

use App\Models\Step;
use Illuminate\Support\Collection;
use Livewire\Component;

class SortableStepsComponent extends Component
{
    public function render()
    {
        return view('livewire.sortable-steps-component', [
            'steps' => Step::orderBy('position')->get()
        ]);
    }

    public function updateTaskOrder($list)
    {
        foreach ($list as $item) {
            Step::find($item['value'])->update(['position' => $item['order']]);
        }
    }
}
