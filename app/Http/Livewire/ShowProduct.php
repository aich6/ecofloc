<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;

class ShowProduct extends Component
{

    public $product;

    public function render(Request $request)
    {

        $this->product = Product::findOrFail($request->session()->get('id'));
        return view('livewire.show-product', ['product' => $this->product]);
    }
}
