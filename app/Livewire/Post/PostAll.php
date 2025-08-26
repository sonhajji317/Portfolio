<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class PostAll extends Component
{
    use WithPagination;
    public $query;

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.post.post-all', [
            'posts' => Post::with(['category', 'author'])
                ->latest()
                ->where('title', 'like', '%' . $this->query . '%')
                ->paginate(6)
        ])->title('Post');
    }
}
