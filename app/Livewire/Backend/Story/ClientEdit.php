<?php

namespace App\Livewire\Backend\Story;

use App\Models\Client;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ClientEdit extends Component
{
    use WithFileUploads;
    public $id;
    public $oldImage;
    #[Rule('required|max:250')]
    public $name;
    #[Rule('nullable|sometimes|file|image|max:1024')] 
    public $image;
    #[Rule('nullable')]
    public $priority;
    #[Rule('nullable')]
    public $status;
    public $client;
    public function mount(int $id){
        $this->id = $id;
        $client = Client::findOrFail($id);
        $this->name = $client->name;
        $this->priority = $client->priority;
        $this->status = $client->status;
        $this->oldImage = $client->image;
    }
    #[Layout('layouts.app')]

    public function render()
    {
        return view('livewire.backend.story.client-edit');
    }
    public function update(){
        $validated = $this->validate();
        $client = Client::findOrFail($this->id);
        if($this->image){
            try {
                unlink(storage_path('app/public/' . $this->oldImage));
                $validated['image'] = $this->image->store('client','public');
                } catch (\Exception $e) {
                     $validated['image'] = $this->image->store('client','public');
                }
            }else{
                $validated['image'] = $this->oldImage;
            }
        $client->update($validated);
        $this->id='';
        $this->oldImage = $validated['image'];
        session()->flash('client_index', 'client updated successfully.');
        $notification = array(
            'message' => 'client updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('story.client')->with($notification);
        
}
}
