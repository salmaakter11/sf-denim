<?php

namespace App\Livewire\Backend\Profile;

use App\Models\Admin;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
class Updateprofile extends Component
{
    use WithFileUploads;
    public $id;
    public $photoPreview;
    public $adminData;
    public $oldImage;
    #[Rule('required')]
    public $name;
    #[Rule('required|email|max:250')]
    public $email;
    #[Rule('required|min:6|max:11')]
    public $phone;
   
    #[Rule('nullable|sometimes|file|image|max:1024')] // 1MB Max
    public $profile_photo_path;

    public function mount(){
        $this->id = Auth::guard('admin')->id();
        $this->adminData = Admin::find($this->id);
        $adminData = $this->adminData;
        $this->name = $adminData->name;
        $this->email = $adminData->email;
        $this->phone = $adminData->phone;
        $this->oldImage = $adminData->profile_photo_path;
    }

    public function render()
    {
        $id= Auth::guard('admin')->id();
        $adminData = Admin::find($id);
        return view('livewire.backend.profile.updateprofile',[
            'adminData'=>$adminData
        ]);
    }
    public function deleteProfilePhoto(){
        $backuser = $this->adminData;
        if( $this->oldImage){
            $path = 'storage/' . $this->oldImage;
            unlink(public_path($path));
        }
        $backuser->update([ 
            'profile_photo_path' => null,
        ]);
        $this->oldImage = null;
        $this->profile_photo_path = null;
        $this->photoPreview = null;
        return redirect()->route('profile.admin');
    }
    public function updateProfileInformation(){
        $validated = $this->validate();
        $backuser = $this->adminData;
        if ($this->profile_photo_path) {
            if( $this->oldImage){
                $path = 'storage/' . $this->oldImage;
                unlink(public_path($path));
            }
            // Storage::delete($this->oldImage);
            $photo = $this->profile_photo_path->store('admin_images', 'public');
        } else {
            $photo = $this->oldImage;
        }
        $backuser->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'profile_photo_path' => $photo,
        ]);
        $this->oldImage = $photo;
        session()->flash('updateprofile', 'User updated Successfully.');
        return redirect()->route('profile.admin');
    }
}
