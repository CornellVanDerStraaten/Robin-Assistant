<?php

namespace App\Http\Livewire;

use App\Models\Audio;
use Livewire\Component;
use Livewire\WithFileUploads;

class StepAudioVideoSelect extends Component
{
    use WithFileUploads;

    public $aidSelectOpen = false;
    public $audio;
    public $step;
    public $title;
    public $existingAudios;
    public $selectedAudioId = null;

    public function mount(  )
    {
        $this->existingAudios = Audio::all();
    }

    public function render()
    {
        return view('livewire.step-audio-video-select');
    }

    public function openAidSelect($open = false)
    {
        $this->aidSelectOpen = $open;
    }

    public function updatedAudio()
    {
        $this->validate([
            'audio' => 'required'
        ]);
    }

    public function selectAudio(Audio $audio)
    {
        $this->selectedAudioId = $audio->id;
    }

    public function saveSelectedAudio()
    {
        if ($this->audio) {
            $url = $this->audio->store('audio', 'public');
            Audio::query()->create([
                'title' => $this->step->title,
                'url' => $url,
            ]);

            $this->emit('addAudioUrl', $url);
        } else {
            $audio = Audio::where('id', $this->selectedAudioId)->first();
            $this->emit('addAudioUrl', $audio->url);
        }

        $this->openAidSelect(false);
    }
}
