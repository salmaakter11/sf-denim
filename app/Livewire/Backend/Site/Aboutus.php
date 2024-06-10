<?php

namespace App\Livewire\Backend\Site;

use App\Models\Site;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Aboutus extends Component
{
    #[Rule('required')]
    public $aboutus;
    public function mount()
    {
        $this->aboutus = Site::findOrNew(1)->take(1)->value('aboutus');
    }
    public function render()
    {
        return view('livewire.backend.site.aboutus');
    }
    public function CreateOrUpdate()
    {
        $validated = $this->validate();
        $site = Site::findOrNew(1);
        $site->fill($validated);

        // Save the updated or new site
        $site->save();
        $notification = array(
            'message' => 'Site aboutus data set successfully.',
            'alert-type' => 'info'
        );
        return redirect()->route('aboutus.index')->with($notification);
    }
}
