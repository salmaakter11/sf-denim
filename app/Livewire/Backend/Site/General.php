<?php

namespace App\Livewire\Backend\Site;

use App\Models\Site;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;


class General extends Component
{
    use WithFileUploads;

    public $oldfav_icon;
    public $oldlogo;

    #[Rule('nullable|sometimes|file|image|max:100')]
    public $fav_icon;
    #[Rule('nullable|sometimes|file|image|max:1024')]
    public $logo;

    #[Rule('required|min:2|max:250')]
    public $title;

    #[Validate('regex:/\+8801[0-9]{9}/', message: 'The phone field format is invalid. Valid format: +8801[9 digit]')]
    #[Validate('required', message: 'Please provide your Primary phome number')]
    #[Validate('min:13', message: 'This phone you gave is too short')]
    #[Validate('max:17', message: 'This phone you gave is too large')]
    public $phone1;
    #[Validate('regex:/\+8801[0-9]{9}/', message: 'The phone field format is invalid. Valid format: +8801[9 digit]')]
    #[Validate('nullable', message: 'Please provide your active phome number')]
    #[Validate('min:13', message: 'This phone you gave is too short')]
    #[Validate('max:17', message: 'This phone you gave is too large')]
    public $phone2;

    #[Validate('regex:/\+8801[0-9]{9}/', message: 'The phone field format is invalid. Valid format: +8801[9 digit]')]
    #[Validate('nullable', message: 'Please provide your active phome number')]
    #[Validate('min:13', message: 'This phone you gave is too short')]
    #[Validate('max:17', message: 'This phone you gave is too large')]
    public $phone3;

    #[Rule('required|email|max:250')]
    public $email;
    #[Rule('nullable|email|max:250')]
    public $email1;
    #[Rule('nullable|email|max:250')]
    public $email2;

    #[Rule('required|min:3|max:250')]
    public $address;

    #[Rule('required|min:3|max:250|url')]
    public $facebook;

    #[Rule('nullable|min:3|max:250|url')]
    public $twitter;

    #[Rule('nullable|min:3|max:250|url')]
    public $instagram;

    #[Rule('nullable|min:3|max:250|url')]
    public $youtube;
    public function mount()
    {
        $site = Site::findOrNew(1);
        $this->oldfav_icon = $site->fav_icon;
        $this->oldlogo = $site->logo;
        $this->title = $site->title;
        $this->phone1 = $site->phone1;
        $this->phone2 = $site->phone2;
        $this->phone3 = $site->phone3;
        $this->email = $site->email;
        $this->email1 = $site->email1;
        $this->email2 = $site->email2;
        $this->address = $site->address;
        $this->facebook = $site->facebook;
        $this->twitter = $site->twitter;
        $this->instagram = $site->instagram;
        $this->youtube = $site->youtube;

    }

    public function render()
    {
        return view('livewire.backend.site.general');
    }
    public function CreateOrUpdate()
    {
        $validated = $this->validate();
        $site = Site::findOrNew(1);
        $site->fill($validated);

        // Handle fav_icon
        if ($this->fav_icon) {
            $this->deleteFile($this->oldfav_icon);
            $site->fav_icon = $this->fav_icon->store('site_fav', 'public');

        } else {
            $site->fav_icon = $this->oldfav_icon;
        }

        // Handle logo
        if ($this->logo) {
            $this->deleteFile($this->oldlogo);
            $site->logo = $this->logo->store('site_logo', 'public');
        } else {
            $site->logo = $this->oldlogo;
        }

        // Save the updated or new site
        $site->save();
        $notification = array(
            'message' => 'General site data set successfully.',
            'alert-type' => 'info'
        );
        return redirect()->route('sitesettings.index')->with($notification);
    }
    private function deleteFile($path)
    {
            try {              
                unlink(storage_path('app/public/' . $path));                                    
            } catch (\Exception $e) {                         
            }
    }
}
