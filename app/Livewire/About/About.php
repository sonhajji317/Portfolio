<?php

namespace App\Livewire\About;

use App\Models\Author;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.about.about', [
            'authors' => Author::latest()->get()
        ]);
    }
}
