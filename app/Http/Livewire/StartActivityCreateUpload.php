<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use Livewire\Component;
use Livewire\WithFileUploads;

class StartActivityCreateUpload extends Component
{
    use WithFileUploads;

    public $show = false;
    public $image = null;

    public function showPopup(bool $show)
    {
        $this->show = $show;
    }

    public function validateImage()
    {
        $this->validate([
            'image' => 'required|image'
        ]);
    }

    public function updatedShow()
    {
        if($this->show === false) {
            $this->image = null;
        }
    }

    public function updatedImage()
    {
        $this->validateImage();
    }

    public function save()
    {
        $this->validateImage();

        $path = $this->image->store('images');

        $activity = Activity::create([
            'user_id' => auth()->id(),
            'image_url' => $path
        ]);

        // TODO: Fix media library spatie
//        $activity
//            ->addMedia($path)
//            ->toMediaCollection();

        return redirect()->route('activity.steps', $activity);
    }

    public function render()
    {
        return view('livewire.start-activity-create-upload');
    }
}
