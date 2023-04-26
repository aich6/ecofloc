<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use Session;
class Compare extends Component
{

public $prodtId=[];
public $count;
public $product ;
   public function removeItem(Request $request , $id){

    unset( $this->product[$id]);
    $request->session()->put('product', $this->product);
    $request->session()->decrement('compare');
    $this->emitTo('compare-count','refreshComponent');


   }
   public function product(Request $request, $id)
    {
        $request->session()->forget('id');
        $request->session()->put('id', $id);
        return redirect()->to('/Product');
    }

  public function addToRequest(Request $request ,$p)
    {


      $test = false;
      if(session('requests')){
        $prod = session('requests');
        foreach($prod as $ps){
          if($ps ==$this->product[$p]){
            $test = true;
            break;
          }
        }
      }
      if(!$test){
        $request->session()->increment('request');
        $request->session()->push('requests', $this->product[$p]);
        $this->emitTo('request-count','refreshComponent');
        $this->dispatchBrowserEvent('alert',
      ['type' => 'success',  'message' => 'Product added to request!']);
      }else{
        $this->dispatchBrowserEvent('alert',
                ['type' => 'info',  'message' => 'Product already added to request!']);
      }
    }

   public function mount(Request $request)
     {
        $this->product =  session('product');
        $this->count = session('compare');

   }


    public function render(Request $request)
    {

        return view('livewire.compare',['products'=>$this->product,'count'=>$this->count]);
    }
}
