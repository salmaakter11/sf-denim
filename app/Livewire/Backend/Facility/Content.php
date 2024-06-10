<?php

namespace App\Livewire\Backend\Facility;

use App\Models\Facility;
use Livewire\Component;

use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
class Content extends Component
{
    use WithFileUploads;
    public $id;

    #[Rule('nullable')]
    public $content;
    public $facility;
    
    public function mount()
    {
        $facility = Facility::findOrNew(1);
        $this->facility=  $facility; 
        $this->content = $facility->content;
    }
    public function render()
    {
        return view('livewire.backend.facility.content');
    }
    public function CreateOrUpdate(){
        $validated = $this->validate();
        $facility = Facility::first();
        if(empty($facility)){
            Facility::create($validated);           
            $notification = array(
                'message' => 'Out facility Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('facility.index')->with($notification);
            }
            else{
            $facility->update($validated);
            $notification = array(
                'message' => 'facility Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('facility.index')->with($notification);
        }
}
}
