<?php

namespace App\Livewire\Backend\Contact;

use App\Models\CareerPost;
use App\Models\ContactPost;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
    use WithPagination;
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $currentPage;
    #[On("contact_index")]
    public function render()
    {
        if ($this->perPage == null) {
            $this->perPage = 10;
            $this->start = 0;
            $this->end = 10;
            $this->currentPage = 0;
        }
        $contact = CareerPost::orderBy('id', 'desc')->with('jobs')->skip($this->start)->take($this->perPage)->get();
        $this->total = CareerPost::count();
        return view('livewire.backend.contact.contact-index',compact('contact'));
    }
    public function delete($id)
    {
        $contact = CareerPost::find($id);
        $contact->delete();
        session()->flash('contact_index', 'contact deleted successfully');
        $this->dispatch('contact_index');
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
