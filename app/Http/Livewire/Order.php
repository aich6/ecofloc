<?php

namespace App\Http\Livewire;

use App\Models\Requests;
use App\Mail\Confirm;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationEmail;

class Order extends Component
{
    public $request;
    public $product;
    protected $listeners = ['refreshMe' => '$refresh'];
    public function removeItem(Request $request, $id)
    {
        unset($this->product[$id]);
        $request->session()->put('requests', $this->product);
        if (session('request') >= 0) {
            $request->session()->decrement('request');
            $this->emitTo('request-count', 'refreshComponent');
        }
    }

    public function cancelAllRequest(Request $request)
    {
        session()->forget('requests');
        session()->forget('request');
        redirect()->to('/');
    }


    public function addRequest()
    {
        $products = session('requests');
        auth()->user()->requests()->create([
            'Products' => $products,
        ]);
        $req = Requests::latest()->get();
        $req = $req->where('user_id', auth()->user()->id)->first();
        $product = $req->Products;
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Request successful!']
        );
        Mail::to('customeronlinerequest@coficab.com')->cc('edgar.silva@coficab.com')->send(new Confirm($product, $users = auth()->user()));
		Mail::to(auth()->user()->email)->send(new OrderConfirmationEmail(auth()->user())); 
        session()->forget('requests');
        session()->forget('request');
        session()->flash('message', 'Request successfully sent .');
        return  redirect()->to('/');
    }
    public function product(Request $request, $id)
    {
        $request->session()->forget('id');
        $request->session()->put('id', $id);
        return redirect()->to('/Product');
    }

    public function mount(Request $request)
    {
        $this->product =  session('requests');
        $this->request = session('request');
    }
    public function render()
    {
        return view('livewire.order', ['products' => $this->product, 'count' => $this->request]);
    }
}
