<?php

namespace App\Livewire\Backend\Career;

use App\Models\JobPost;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CareerCreate extends Component
{

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
    public function render()
    {
        return view('livewire.backend.career.career-create');
    }
    public function create()
    {   
        $validated = $this->validate();
        $jobPost = JobPost::create($validated);
        $this->reset(
            "title",
            "content",
            "bdjobs",
            "pdate",
            "ddate",          
        );
        session()->flash('jobs_create', 'New Job post Added');
        $this->dispatch('career_index');
    }
}
