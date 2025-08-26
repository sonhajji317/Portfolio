<?php

namespace App\Livewire\Contact;

use Livewire\Component;
use App\Models\Feedback;

class ContactMe extends Component
{
    public $name, $email, $message;

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

    public function render()
    {
        return view('livewire.contact.contact-me');
    }
}
