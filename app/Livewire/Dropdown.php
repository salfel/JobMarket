<?php

namespace App\Livewire;

use Livewire\Component;

class Dropdown extends Component
{
    public bool $show = false;

    public function toggle()
    {

    }

    public function render()
    {
        return view('livewire.dropdown');
    }
}
