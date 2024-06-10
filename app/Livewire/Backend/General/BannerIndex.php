<?php

namespace App\Livewire\Backend\General;

use App\Models\Banner;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BannerIndex extends Component
{
    use WithFileUploads;
    public $id;
    public $oldstory;
    public $oldpurpose;
    public $oldpeople;
    #[Rule('nullable|sometimes|file|image|max:1024')] // 1MB Max
    public $story;

    #[Rule('nullable|sometimes|file|image|max:1024')] // 1MB Max
    public $purpose;

    #[Rule('nullable|sometimes|file|image|max:1024')] // 1MB Max
    public $people;
   
    public function mount(){
        $banner = Banner::first();
        if(!empty($banner)){
        $this->oldstory=$banner->story;
        $this->oldpurpose=$banner->purpose;
        $this->oldpeople=$banner->people;
        }
    }
    #[On("banner_index")]
    public function render()
    {
        return view('livewire.backend.general.banner-index');
    }

    public function saveOrUpdate(){
        $validated = $this->validate();
        $banner = Banner::first();
        if(empty($banner)){
            if (($this->story)) {
                $validated['story'] = $this->story->store('banner', 'public');
            }
            if (($this->purpose)) {
                $validated['purpose'] = $this->purpose->store('banner', 'public');
            }
            if (($this->people)) {
                $validated['people'] = $this->people->store('banner', 'public');
            }
            Banner::create($validated);           
            $notification = array(
                'message' => 'Product banner Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('banner.index')->with($notification);
        }else{
            if ($this->story) {
                try {
                    // Attempt to unlink the old image
                    unlink(storage_path('app/public/' . $this->oldstory));           
                    // If unlink is successful, store the new image
                    $validated['story'] = $this->story->store('banner', 'public');
                } catch (\Exception $e) {
                    // If unlink fails, set a notification and redirect
                     $validated['story'] = $this->story->store('banner', 'public');
                }
            } else {
                $validated['story'] = $this->oldstory;
            }
            if ($this->purpose) {
                try {
                    // Attempt to unlink the old image
                    unlink(storage_path('app/public/' . $this->oldpurpose));           
                    // If unlink is successful, store the new image
                    $validated['purpose'] = $this->purpose->store('banner', 'public');
                } catch (\Exception $e) {
                    // If unlink fails, set a notification and redirect
                   $validated['purpose'] = $this->purpose->store('banner', 'public');
                }               
            } else {
                $validated['purpose'] = $this->oldpurpose;
            }
            if ($this->people) {
                try {
                    // Attempt to unlink the old image
                    unlink(storage_path('app/public/' . $this->oldpeople));           
                    // If unlink is successful, store the new image
                    $validated['people'] = $this->people->store('banner', 'public');
                } catch (\Exception $e) {
                    // If unlink fails, set a notification and redirect
                     $validated['people'] = $this->people->store('banner', 'public');
                }             
            } else {
                $validated['people'] = $this->oldpeople;
            }
            $banner->update($validated);
            $notification = array(
                'message' => 'Product banner Page Updated.',
                'alert-type' => 'success'
            );
            return redirect()->route('banner.index')->with($notification);
        }
    }
}
