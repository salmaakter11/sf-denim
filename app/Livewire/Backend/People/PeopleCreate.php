<?php

namespace App\Livewire\Backend\People;

use App\Models\People;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class PeopleCreate extends Component
{
    use WithFileUploads;
    #[Rule('required|max:250')]
    public $name;
    #[Rule('required|max:250')]
    public $designation;
    #[Rule('required|max:250')]
    public $group;
    #[Rule('required|sometimes|file|image|max:1024')] 
    public $image;
    #[Rule('nullable')]
    public $priority;
    #[Rule('nullable')]
    public $status;
    #[On("people_create")]
    public function render()
    {
        return view('livewire.backend.people.people-create');
    }
    public function save()
    {   
        $validated = $this->validate();
        if ($this->image) {
            $validated['image'] = $this->image->store('people', 'public');
        }
        $people = People::create($validated);
        $this->reset(
            "name",
            "image",
            "priority",
        );
        session()->flash('people_create', 'New people Added');
        $peoples = People::paginate(10);
        $this->dispatch('people_index', $peoples);
    }
}
