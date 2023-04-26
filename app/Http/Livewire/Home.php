<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Http\services\RequestService;

class Home extends Component
{
    use WithPagination;

    public $pid;
    public $compare = 0;
    public $max;
    public $perPage = 12;
    public $prod;
    public $data_image;
    protected $listeners = ['addToCompare', 'addToRequest', 'product'];





    public function addToRequest(Request $request, $p)
    {


        $test = false;
        if (session('requests')) {
            $prod = session('requests');
            foreach ($prod as $ps) {
                if ($ps['id'] == $p['id']) {
                    $test = true;
                    break;
                }
            }
        }
        if (!$test) {
            $request->session()->increment('request');
            $request->session()->push('requests', $p);
            $this->emitTo('request-count', 'refreshComponent');
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'success',  'message' => $p['PRODUCT'] . '  added to request list! <br> <a href="/Order" > Please check your Request list.</a>']
            );
        } else {
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'info',  'message' => $p['PRODUCT'] . '  already added to request list! <br> <a href="/Order" > Please check your Request list.</a>']
            );
        }
        $this->dispatchBrowserEvent('closeModal');
    }

    public function addToCompare(Request $request, $p)
    {
        $test = false;
        if (session('compare') < 4) {
            if (session('product')) {
                $prod = session('product');
                foreach ($prod as $ps) {
                    if ($ps['id'] == $p['id']) {
                        $test = true;
                        break;
                    }
                }
            }
            if (!$test) {
                $request->session()->increment('compare');
                $request->session()->push('product', $p);
                $this->emitTo('compare-count', 'refreshComponent');
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'success',  'message' => $p['PRODUCT'] . '  added to comparison list! <br> <a href="/Compare" > Please check your Comparison list.</a>']
                );
            } else {
                $this->dispatchBrowserEvent(
                    'alert',
                    ['type' => 'info',  'message' => $p['PRODUCT'] . '  already added to comparison list! <br> <a href="/Compare" > Please check your Comparison list.</a>']
                );
            }
            $this->dispatchBrowserEvent('closeModal');
        } else {
            $test = true;
            $this->dispatchBrowserEvent(
                'alert',
                ['type' => 'warning',  'message' => 'Product comparising limit is 4 !<br> <a href="/Compare" > Please check your Comparison list.</a>']
            );
        }
    }
    public function loadMore()
    {
        $this->perPage = $this->perPage + 4;
    }



    public function product($id)
    {

        $this->prod = Product::findOrFail($id);

        $this->data_image =  $this->prod->image_data;
        $this->dispatchBrowserEvent('openModal');
    }

    public function close()
    {
        $this->data_image = '';
        $this->dispatchBrowserEvent('closeModal');
    }
    public function render()
    {
        $product = Product::where('INSULATION_TYPE', 'SIR/XLPO')->get();
        $product = collect($product)->paginate($this->perPage);

        $this->max = count($product);
        return view('livewire.home', ['products' => $product, 'value' => session('compare'), 'values' => session('request'), 'max' => $this->max]);
    }
}
