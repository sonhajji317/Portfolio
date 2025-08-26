<?php

namespace App\Livewire\Front;

use App\Models\Post;
use Livewire\Component;

class Hero extends Component
{
    public function render()
    {
        return view('livewire.front.hero', [
            'posts' => Post::with(['author', 'category'])
                ->latest()
                ->first()
        ]);
    }
}
