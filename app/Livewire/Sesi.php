<?php

namespace App\Livewire;

use App\Models\Rekaps;
use Livewire\Component;

class Sesi extends Component
{
    public function render()
    {
        return view('livewire.sesis.index', [
            'listsesi' => Rekaps::all()
        ]);
    }
}
