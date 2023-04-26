<?php

namespace App\Http\Livewire;
use App\Models\Requests;
use Livewire\Component;
use Livewire\WithPagination;
class ShowRequest extends Component
{
    use WithPagination;

    public function delReq($id){
        $req = Requests::findOrFail($id);
        $req = $req->delete();


        $this->dispatchBrowserEvent('alert',
        ['type' => 'error',  'message' => 'Request deleted!']);


     }



    public function render()
    {


        return view('livewire.show-request',[ 'req'=>Requests::latest()->where('user_id',auth()->user()->id)->paginate(5)]);
    }
}
