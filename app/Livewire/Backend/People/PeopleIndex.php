<?php

namespace App\Livewire\Backend\People;

use App\Models\People;
use Livewire\Component;
use Livewire\Attributes\On;

class PeopleIndex extends Component
{
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $currentPage;
    #[On("people_index")]
    public function render()
    {
        if ($this->perPage == null) {
            $this->perPage = 10;
            $this->start = 0;
            $this->end = 10;
            $this->currentPage = 0;
        }
        $people = People::orderBy('id', 'asc')->skip($this->start)->take($this->perPage)->get();
        $this->total = People::count();
        return view('livewire.backend.people.people-index',compact('people'));
    }
    public function delete($id)
    {
        $people = people::find($id);
        if ($people->people) {
            try {
                unlink(storage_path('app/public/' .$people->people));                      
                } catch (\Exception $e) {             
                     
                }
        }
        $people->delete();
        session()->flash('people_index', 'people deleted successfully');
        $this->dispatch('people_index');
    }
    public function  perPagechange($val)
    {
        $this->perPage = (int)$val;
        $this->end = (int)$val;
    }

    public function activate($id)
    {
        $people = People::find($id);
        if ($people->status == 1) {
            $people->status = 0;
           
        } else {
            $people->status = 1;
        }
        $people->update();
    }
    public function paginate($page)
    {
        $this->start = $page * $this->perPage;
        $this->currentPage = $page;
        $this->end = $this->start + $this->perPage;
    }
}
