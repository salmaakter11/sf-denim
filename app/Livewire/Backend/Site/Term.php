<?php

namespace App\Livewire\Backend\Site;

use App\Models\Site;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Term extends Component
{
    #[Rule('required')]
    public $term;
    public function mount()
    {
        $this->term = Site::findOrNew(1)->take(1)->value('term');
    }

    public function render()
    {
        return view('livewire.backend.site.term');
    }
    public function CreateOrUpdate()
    {
        $validated = $this->validate();
        $site = Site::findOrNew(1);
        $site->fill($validated);

        // Save the updated or new site
        $site->save();
        $notification = array(
            'message' => 'Site Term data set successfully.',
            'alert-type' => 'info'
        );
        return redirect()->route('term.index')->with($notification);
    }
}
