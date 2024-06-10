<?php

namespace App\Livewire\Frontend\Comment;

use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;

use App\Models\Comment;


class Makecomment extends Component
{
    #[Rule('required|min:3|max:250')]
    public $name;
    #[Rule('required|email|min:3|max:250')]
    public $email;
    #[Rule('required|min:3|max:250')]
    public $subject;
    #[Rule('required|min:3|max:250')]
    public $textmessage;

    #[On("commentsegment")]
    public function render()
    {
        return view('livewire.frontend.comment.makecomment');
    }

    public function save()
    {
        try {
            // Validate input data
            $this->validate([
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'textmessage' => 'required',
                // Add more validation rules as needed
            ]);
    
            // Create comment if validation passes
            $comment = Comment::create([
                'name' => $this->name,
                'email' => $this->email,
                'subject' => $this->subject,
                'message' => $this->textmessage,
            ]);            
            $this->reset('name', 'email', 'subject', 'textmessage');
            // Flash success message
            session()->flash('success', 'Successfully added your comment.');
            
            // Dispatch comment segment
            $this->dispatch('commentsegment', $comment);
        } catch (\Exception $e) {
            // Handle the exception
            report($e);
            session()->flash('success', 'An error occurred while saving the comment. Please try again.');
        }
        $notification = array(
            'message' => 'Message send successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('welcome')->with($notification);
    }
}
