<?php

namespace App\Livewire\Post;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;

class PostDetails extends Component
{
    public $post, $title, $content, $author, $category, $published_at, $thumbnail, $slug, $name, $email, $comment;

    public function commentAdd()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $this->post->id,
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
            'approved' => false, // New comments are not approved by default
        ]);

        // Clear the form fields
        $this->name = '';
        $this->email = '';
        $this->comment = '';

        // Optionally, you can add a success message or redirect
        session()->flash('message', 'Comment submitted successfully.');
        // return $this->redirect('/post/{id}/details');
    }

    public function mount($id)
    {
        $this->post = Post::with(['author', 'category'])->findOrFail($id);
        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->author = $this->post->author->name;
        $this->category = $this->post->category->name;
        $this->published_at = $this->post->published_at;
        $this->thumbnail = $this->post->thumbnail;
        $this->slug = $this->post->slug;
    }
    public function render()
    {
        return view('livewire.post.post-details', [
            'posts' => Post::with(['comments', 'category', 'author'])
                ->where('id', $this->post->id)
                ->first(),
        ])->title('Post Details');
    }
}
