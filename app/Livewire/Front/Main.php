<?php

namespace App\Livewire\Front;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use App\Models\Feedback;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $name, $email, $message, $post_id, $approved, $post;

    public $selectedCategory = null; //kategori yg dipilih

    protected $queryString = ['selectedCategory']; //menyimpan state di url

    public function add()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Feedback::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);

        // Clear the form fields
        $this->name = '';
        $this->email = '';
        $this->message = '';
        // Optionally, you can add a success message or redirect
        session()->flash('message', 'Message submitted successfully.');
    }

    public function UpdatingSelectedCategory()
    {
        $this->resetPage(); //reset halaman pagination saat kategori diubah
    }

    public function render()
    {
        $query = Post::with(['author', 'category'])->latest();

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        return view('livewire.front.main', [
            'posts' => $query->paginate(6),
            'categories' => Category::latest()
                ->get()
        ]);
    }
}
