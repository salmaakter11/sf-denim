<?php

namespace App\Livewire\Backend\People;

use Livewire\Component;
use App\Models\People;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class PeopleEdit extends Component
{
    use WithFileUploads;
    public $id;
    public $oldImage;
    #[Rule('required|max:250')]
    public $name;
    #[Rule('required|max:250')]
    public $designation;
    #[Rule('required|max:250')]
    public $group;
    #[Rule('nullable|sometimes|file|image|max:1024')] 
    public $image;
    #[Rule('nullable')]
    public $priority;
    #[Rule('nullable')]
    public $status;
   
    public function mount(int $id){
        $this->id = $id;
        $people = People::findOrFail($id);
        $this->name = $people->name;
        $this->designation = $people->designation;
        $this->group = $people->group;
        $this->priority = $people->priority;
        $this->status = $people->status;
        $this->oldImage = $people->image;
    }
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.backend.people.people-edit');
    }
    public function update(){
        $validated = $this->validate();
        $people = people::findOrFail($this->id);
        if($this->image){
            try {
                unlink(storage_path('app/public/' . $this->oldImage));
                $validated['image'] = $this->image->store('people','public');
                } catch (\Exception $e) {
                     $validated['image'] = $this->image->store('people','public');
                }
            }else{
                $validated['image'] = $this->oldImage;
            }
        $people->update($validated);
        $this->id='';
        $this->oldImage = $validated['image'];
        session()->flash('people_index', 'people updated successfully.');
        $notification = array(
            'message' => 'people updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('people.index')->with($notification);
        
}
}
