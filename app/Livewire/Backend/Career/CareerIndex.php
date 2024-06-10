<?php

namespace App\Livewire\Backend\Career;

use App\Models\CareerPost;
use App\Models\JobPost;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CareerIndex extends Component
{
    use WithPagination;
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $currentPage;
    #[On("career_index")]
    public function render()
    {
        if ($this->perPage == null) {
            $this->perPage = 10;
            $this->start = 0;
            $this->end = 10;
            $this->currentPage = 0;
        }
        $career = JobPost::orderBy('id', 'desc')->skip($this->start)->take($this->perPage)->get();
        $this->total = JobPost::count();
        return view('livewire.backend.career.career-index',compact('career'));
    }
    public function delete($id)
    {
        $career = JobPost::find($id);
        $career->delete();
        session()->flash('career_index', 'career deleted successfully');
        $this->dispatch('career_index');
    }
    public function  perPagechange($val)
    {
        $this->perPage = (int)$val;
        $this->end = (int)$val;
    }
    public function paginate($page)
    {
        $this->start = $page * $this->perPage;
        $this->currentPage = $page;
        $this->end = $this->start + $this->perPage;
    }
}
