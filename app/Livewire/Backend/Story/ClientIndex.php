<?php

namespace App\Livewire\Backend\Story;

use App\Models\Client;
use Livewire\Attributes\On;
use Livewire\Component;

class ClientIndex extends Component
{
    public $perPage;
    public $start;
    public $end;
    public $total;
    public $currentPage;
    #[On("client_index")]
    public function render()
    {
        if ($this->perPage == null) {
            $this->perPage = 10;
            $this->start = 0;
            $this->end = 10;
            $this->currentPage = 0;
        }
        $client = Client::orderBy('id', 'asc')->skip($this->start)->take($this->perPage)->get();
        $this->total = Client::count();
        return view('livewire.backend.story.client-index',compact('client'));
    }
    public function delete($id)
    {
        $client = Client::find($id);
        if ($client->client) {
            try {
                unlink(storage_path('app/public/' .$client->client));                      
                } catch (\Exception $e) {             
                     
                }
        }
        $client->delete();
        session()->flash('client_index', 'client deleted successfully');
        $this->dispatch('client_index');
    }
    public function  perPagechange($val)
    {
        $this->perPage = (int)$val;
        $this->end = (int)$val;
    }

    public function activate($id)
    {
        $client = Client::find($id);
        if ($client->status == 1) {
            $client->status = 0;
           
        } else {
            $client->status = 1;
        }
        $client->update();
    }
    public function paginate($page)
    {
        $this->start = $page * $this->perPage;
        $this->currentPage = $page;
        $this->end = $this->start + $this->perPage;
    }
}
