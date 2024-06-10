<?php

namespace App\Livewire\Backend\Rolepermission;

use App\Models\Admin;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Backuserlist extends Component
{
    use WithPagination;
    
    #[On("backenduserlist")]
    public function render()
    {
        return view('livewire.backend.rolepermission.backuserlist',[
            // 'backusers'=> Admin::where('id','!=',1)->paginate(10),
            'backusers'=> Admin::paginate(10),
           
        ]);
    }
    public function delete($id)
    {
        $backuser = Admin::where('id',$id)->first();
        if($backuser->profile_photo_path){
            $path = 'storage/' . $backuser->profile_photo_path;
            unlink(public_path($path));
        }
        $backuser->delete();
        $backusers =  Admin::where('id','!=',1)->paginate(10);
        session()->flash('backenduserlist','Our User deleted successfully');
        $this->dispatch('backenduserlist', $backusers);
    }
}
