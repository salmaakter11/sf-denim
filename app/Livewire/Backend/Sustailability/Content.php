<?php

namespace App\Livewire\Backend\Sustailability;

use App\Models\Sustailability;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class Content extends Component
{
    use WithFileUploads;
    public $id;
    public $oldImage;

    #[Rule('nullable|sometimes|file|image|max:1024')] // 1MB Max
    public $image;

    #[Rule('nullable')]
    public $content;
    public $sustailability;
    
    public function mount()
    {
        $sustailability = Sustailability::findOrNew(1);
        $this->sustailability=  $sustailability; 
        $this->content = $sustailability->content;
        $this->oldImage = $sustailability->image;
    }
    public function render()
    {
        return view('livewire.backend.sustailability.content');
    }
    public function CreateOrUpdate(){
        $validated = $this->validate();
        $sustailability = Sustailability::first();
        if(empty($sustailability)){
            if (($this->image)) {
                $validated['image'] = $this->image->store('sustailability', 'public');
            }
            Sustailability::create($validated);           
            $notification = array(
                'message' => 'Out sustailability Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('sustailability.index')->with($notification);
            }
            else{
            if ($this->image) {
                try {
                    unlink(storage_path('app/public/' . $this->oldImage));           
                    // If unlink is successful, store the new image
                    $validated['image'] = $this->image->store('sustailability', 'public');
                } catch (\Exception $e) {
                    // If unlink fails, set a notification and redirect
                     $validated['image'] = $this->image->store('sustailability', 'public');
                }
            } else {
                $validated['image'] = $this->oldImage;
            }
            $sustailability->update($validated);
            $notification = array(
                'message' => 'Sustailability Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('sustailability.index')->with($notification);
        }
}
}
