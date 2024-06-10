<?php

namespace App\Livewire\Frontend\Home;

use App\Models\CareerPost;
use App\Models\Facility;
use App\Models\JobPost;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Career extends Component
{
    use WithFileUploads;
    public $site;

    #[Rule('required')]
    public $job_post_id;

    #[Rule('required|max:250')]
    public $fullname;
    #[Rule('required|email|max:250')]
    public $email;

    #[Rule('required|max:250')]
    public $address;

    #[Validate('required', message: 'Please provide your active phome number')]
    #[Validate('min:6', message: 'This phone you gave is too short')]
    #[Validate('max:16', message: 'This phone you gave is too large')]
    public $tel;

    #[Rule('required')]
    public $date_of_birth;

    #[Rule('required')]
    public $file;

    public function render()
    {
        $jobs = JobPost::where('pdate', '<=', now())
        ->where('ddate', '>', now())
        ->get();
        return view('livewire.frontend.home.career',compact('jobs'));
    }
    
}
