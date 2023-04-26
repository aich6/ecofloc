<?php

namespace App\Http\services;

use App\Models\Product;
use Illuminate\Http\Request;

class RequestService
{
    public function __construct(private Request $request)
    {

    }

    public function addRequest(Product $product)
    {
        $test = false;
        if (session('requests')) {
            $prod = session('requests');
            foreach ($prod as $ps) {
                if ($ps['id'] == $product['id']) {
                    $test = true;
                    break;
                }
            }
        }
        if (!$test) {
            $this->request->session()->increment('request');
            $this->request->session()->push('requests', $p);
            return true;
        } else {
            return false;
        }
    }
}
