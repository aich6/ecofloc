<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Http\Request;

class ShowProducts extends Component

{
  use WithPagination;
  use WithFileUploads;

  public $CONDUCTOR_TYPE = [];
  public $SINGLE_MULTICORE = [];
  public $TEMP_CLASS = [];
  public $SHIELDED_UNSHIELDED = [];
  public $INSULATION_THICKNESS = [];
  public $INSULATION_TYPE = [];
  public $VOLTAGE_LEVEL = [];
  public $CHEMICAL_RESISTANCE = [];
  public $FLEXIBILITY = [];
  public $ABRASION = [];
  public $SHIELDING_TYPE = [];




  public $prod;
  public $data_image = '';
  public $max;
  public $pid;
  public $compare = 0;
  public $search;
  public $active = [];
  public $perPage = 12;

  protected $listeners = ['addToCompare', 'addToRequest', 'product', 'load-more' => 'loadMore'];

  public function resetCONDUCTOR_TYPE($k)
  {
    unset($this->CONDUCTOR_TYPE[$k]);
  }

  public function resetSINGLE_MULTICORE($k)
  {
    unset($this->SINGLE_MULTICORE[$k]);
  }
  public function resetTEMP_CLASS($k)
  {
    unset($this->TEMP_CLASS[$k]);
  }
  public function resetSHIELDED_UNSHIELDED($k)
  {
    unset($this->SHIELDED_UNSHIELDED[$k]);
  }
  public function resetINSULATION_THICKNESS($k)
  {
    unset($this->INSULATION_THICKNESS[$k]);
  }
  public function resetINSULATION_TYPE($k)
  {
    unset($this->INSULATION_TYPE[$k]);
  }
  public function resetVOLTAGE_LEVEL($k)
  {
    unset($this->VOLTAGE_LEVEL[$k]);
  }
  public function resetFLEXIBILITY($k)
  {
    unset($this->FLEXIBILITY[$k]);
  }
  public function resetABRASION($k)
  {
    unset($this->ABRASION[$k]);
  }
  public function resetSHIELDING_TYPE($k)
  {
    unset($this->SHIELDING_TYPE[$k]);
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
          ['type' => 'info',  'message' => $p['PRODUCT'] . ' already added to comparison list! <br> <a href="/Compare" > Please check your Comparison list.</a>']
        );
      }
      $this->dispatchBrowserEvent('closeModal');
    } else {
      $test = true;
      $this->dispatchBrowserEvent(
        'alert',
        ['type' => 'warning',  'message' => 'Product comparising limit is 4! <br> <a href="/Compare" > Please check your Comparison list.</a>']
      );
    }


    $this->dispatchBrowserEvent('closeModal');
  }
  public function loadMore()
  {
    $this->perPage = $this->perPage + 8;
  }


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
        ['type' => 'info',  'message' => $p['PRODUCT'] . '  already added  to request list! <br> <a href="/Order" > Please check your Request list.</a>']
      );
    }


    $this->dispatchBrowserEvent('closeModal');
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


  public function resets()
  {
    $this->CONDUCTOR_TYPE = [];
    $this->SINGLE_MULTICORE = [];
    $this->TEMP_CLASS = [];
    $this->SHIELDED_UNSHIELDED = [];
    $this->INSULATION_THICKNESS = [];
    $this->INSULATION_TYPE = [];
    $this->VOLTAGE_LEVEL = [];
    $this->CHEMICAL_RESISTANCE = [];
    $this->FLEXIBILITY = [];
    $this->ABRASION = [];
    $this->SHIELDING_TYPE = [];
  }


  public function render(Request $request)
  {

    $product = Product::all();


    $product = $product->when($this->TEMP_CLASS, function ($product) use ($request) {
      return $product->wherein('TEMPERATURE_CLASS', $this->TEMP_CLASS);
    })
      ->when($this->search, function ($product) use ($request) {
        $searchTerm = '%' . $this->search . '%';
        return Product::orderBy('id', 'DESC')->where('id', 'LIKE', $searchTerm)->orWhere('Number', 'LIKE', $searchTerm)
          ->orWhere('Year', 'LIKE', $searchTerm)
          ->orWhere('PRODUCT', 'LIKE', $searchTerm)
          ->orWhere('CONDUCTOR_TYPE', 'LIKE', $searchTerm)
          ->orWhere('SINGLE_MULTICORE', 'LIKE', $searchTerm)
          ->orWhere('SHIELDED_UNSHIELDED', 'LIKE', $searchTerm)
          ->orWhere('SHIELDING_TYPE', 'LIKE', $searchTerm)
          ->orWhere('INSULATION_TYPE', 'LIKE', $searchTerm)
          ->orWhere('INSULATION_THICKNESS', 'LIKE', $searchTerm)
          ->orWhere('VOLTAGE_LEVEL', 'LIKE', $searchTerm)
          ->orWhere('ABRASION', 'LIKE', $searchTerm)
          ->orWhere('CHEMICAL_RESISTANCE', 'LIKE', $searchTerm)
          ->orWhere('FLEXIBILITY', 'LIKE', $searchTerm)
          ->orWhere('TEMPERATURE_CLASS', 'LIKE', $searchTerm)->get();
      })
      ->when($this->SINGLE_MULTICORE, function ($product) use ($request) {
        return $product->wherein('SINGLE_MULTICORE', $this->SINGLE_MULTICORE);
      })
      ->when($this->CONDUCTOR_TYPE, function ($product) use ($request) {
        return $product->wherein('CONDUCTOR_TYPE', $this->CONDUCTOR_TYPE);
      })
      ->when($this->SHIELDED_UNSHIELDED, function ($product) use ($request) {
        return $product->wherein('SHIELDED_UNSHIELDED', $this->SHIELDED_UNSHIELDED);
      })
      ->when($this->INSULATION_TYPE, function ($product) use ($request) {
        return $product->wherein('INSULATION_TYPE', $this->INSULATION_TYPE);
      })
      ->when($this->INSULATION_THICKNESS, function ($product) use ($request) {
        return $product->wherein('INSULATION_THICKNESS', $this->INSULATION_THICKNESS);
      })
      ->when($this->VOLTAGE_LEVEL, function ($product) use ($request) {
        return $product->wherein('VOLTAGE_LEVEL', $this->VOLTAGE_LEVEL);
      })
      ->when($this->ABRASION, function ($product) use ($request) {
        return $product->wherein('ABRASION', $this->ABRASION);
      })
      ->when($this->CHEMICAL_RESISTANCE, function ($product) use ($request) {
        return $product->wherein('CHEMICAL_RESISTANCE', $this->CHEMICAL_RESISTANCE);
      })
      ->when($this->FLEXIBILITY, function ($product) use ($request) {
        return $product->wherein('FLEXIBILITY', $this->FLEXIBILITY);
      })
      ->when($this->SHIELDING_TYPE, function ($product) use ($request) {
        return $product->wherein('SHIELDING_TYPE', $this->SHIELDING_TYPE);
      });
    $product = collect($product)->paginate($this->perPage);
    $this->max = count($product);
    return view('livewire.show-products', ['products' => $product, 'value' => session('compare'), 'values' => session('request'), 'max' => $this->max]);
  }
}
