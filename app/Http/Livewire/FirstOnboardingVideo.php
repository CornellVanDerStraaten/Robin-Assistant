<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class FirstOnboardingVideo extends Component
{
    public $open = false;

    public function mount()
    {
        if (!auth()->user()->first_onboarding) {
            $this->open = true;
        }
    }

    public function render()
    {
        return view('livewire.first-onboarding-video');
    }

    public function close()
    {
        $this->open = false;
        $user = User::where('id', auth()->user()->id)->first();

        $user->first_onboarding = true;
        $user->save();
    }
}
