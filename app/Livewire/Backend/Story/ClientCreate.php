<?php

namespace App\Livewire\Backend\Story;

use App\Models\Client;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientCreate extends Component
{
    use WithFileUploads;
    #[Rule('required|max:250')]
    public $name;
    #[Rule('required|sometimes|file|image|max:1024')] 
    public $image;
    #[Rule('nullable')]
    public $priority;
    #[Rule('nullable')]
    public $status;

    #[On("client_create")]
    public function render()
    {
        return view('livewire.backend.story.client-create');
    }
    public function save()
    {   
        $validated = $this->validate();
        if ($this->image) {
            $validated['image'] = $this->image->store('client', 'public');
        }
        $client = Client::create($validated);
        $this->reset(
            "name",
            "image",
            "priority",
        );
        session()->flash('client_create', 'New client Added');
        $clients = Client::paginate(10);
        $this->dispatch('client_index', $clients);
    }
}
