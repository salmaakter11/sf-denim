<?php

namespace App\Livewire\Backend\Site;

use App\Models\Site;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Policy extends Component
{
    #[Rule('required')]
    public $policy;
    public function mount()
    {
        $this->policy = Site::findOrNew(1)->take(1)->value('policy');
    }

    public function render()
    {
        return view('livewire.backend.site.policy');
    }
    public function CreateOrUpdate()
    {
        $validated = $this->validate();
        $site = Site::findOrNew(1);
        $site->fill($validated);

        // Save the updated or new site
        $site->save();
        $notification = array(
            'message' => 'Site Policy data set successfully.',
            'alert-type' => 'info'
        );
        return redirect()->route('policy.index')->with($notification);
    }
}
