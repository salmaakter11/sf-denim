<?php

namespace App\Livewire\Backend\Career;

use App\Models\JobPost;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CareerEdit extends Component
{

    public $id;
    #[Rule('required|max:250')]
    public $title;
    #[Rule('required')]
    public $content;
    #[Rule('required|max:250')]
    public $bdjobs;
    #[Rule('required')]
    public $pdate;
    #[Rule('required')]
    public $ddate;
 public function mount(int $id)
    {
        $this->id = $id;
        $jobpost = JobPost::findOrFail($id);
        $this->title =  $jobpost->title;
        $this->content =  $jobpost->content;
        $this->bdjobs =  $jobpost->bdjobs;
        $this->pdate =  $jobpost->pdate;
        $this->ddate =  $jobpost->ddate;
    }
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.backend.career.career-edit');
    }
    public function update()
    {
        $validated = $this->validate();
        $jobpost = JobPost::findOrFail($this->id);
        $jobpost->update($validated);
        $this->id = '';
        session()->flash('career_index', 'Job post updated successfully.');
        $notification = array(
            'message' => $jobpost->title.' Job post updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('career.index')->with($notification);
    }
}
