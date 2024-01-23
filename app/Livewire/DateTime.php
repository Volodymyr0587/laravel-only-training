<?php

namespace App\Livewire;

use Livewire\Component;

class DateTime extends Component
{
    public $time;

    public function mount()
    {
        $this->time = now();
    }
    public function render()
    {
        return view('livewire.date-time');
    }
}
