<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CompareCount extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];



    public function render()
    {
		if(session('compare')<0){
			session(['compare' => 0]);
		}

        return view('livewire.compare-count',['compare' => session('compare')]);
    }
}
