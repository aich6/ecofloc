<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('Year', 'ASC')->orderBy('Number', 'ASC')->get();
        return view('products.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  request()->validate([
            'Number' => 'required|numeric',
            'Year' => 'required|numeric',
            'PRODUCT' => 'required',
            'CONDUCTOR_TYPE' => 'required',
            'SINGLE_MULTICORE' => 'required',
            'SHIELDED_UNSHIELDED' => 'required',
            'SHIELDING_TYPE' => 'required',
            'INSULATION_TYPE' => 'required',
            'INSULATION_THICKNESS' => 'required',
            'VOLTAGE_LEVEL' => 'required',
            'ABRASION' => 'required',
            'CHEMICAL_RESISTANCE' => 'required',
            'FLEXIBILITY' => 'required',
            'TEMPERATURE_CLASS' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image_data' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if (request('image_data')) {
            $imagePath = time() . '-' . $request->PRODUCT . 'data.' . $request->image_data->extension();
            $request->image_data->move(public_path('storage/images/products_data'), $imagePath);
            $imagePathData = 'images/products_data/' . $imagePath;
        }
        if (request('image')) {
            $newImageName = time() . '-' . request('PRODUCT') . '.' . request('image')->extension();
            $request->image->move(public_path('storage/images/products_image'), $newImageName);
            $imagePath =  'images/products_image/' . $newImageName;
        }
        Product::create([
            'Number' => $data['Number'],
            'Year' => $data['Year'],
            'PRODUCT' => $data['PRODUCT'],
            'CONDUCTOR_TYPE' => $data['CONDUCTOR_TYPE'],
            'SINGLE_MULTICORE' => $data['SINGLE_MULTICORE'],
            'SHIELDED_UNSHIELDED' => $data['SHIELDED_UNSHIELDED'],
            'SHIELDING_TYPE' => $data['SHIELDING_TYPE'],
            'INSULATION_TYPE' => $data['INSULATION_TYPE'],
            'INSULATION_THICKNESS' => $data['INSULATION_THICKNESS'],
            'VOLTAGE_LEVEL' => $data['VOLTAGE_LEVEL'],
            'ABRASION' => $data['ABRASION'],
            'CHEMICAL_RESISTANCE' => $data['CHEMICAL_RESISTANCE'],
            'FLEXIBILITY' => $data['FLEXIBILITY'],
            'TEMPERATURE_CLASS' => $data['TEMPERATURE_CLASS'],
            'image' => $imagePath,
            'image_data' => $imagePathData,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data =  request()->validate([
            'Number' => 'required',
            'Year' => 'required',
            'PRODUCT' => 'required',
            'CONDUCTOR_TYPE' => 'required',
            'SINGLE_MULTICORE' => 'required',
            'SHIELDED_UNSHIELDED' => 'required',
            'SHIELDING_TYPE' => 'required',
            'INSULATION_TYPE' => 'required',
            'INSULATION_THICKNESS' => 'required',
            'VOLTAGE_LEVEL' => 'required',
            'ABRASION' => 'required',
            'CHEMICAL_RESISTANCE' => 'required',
            'FLEXIBILITY' => 'required',
            'TEMPERATURE_CLASS' => 'required',
            'image_data' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if (request('image_data')) {
            $des_data='storage/'.$product->image_data;
            if(File::exists($des_data)){
                File::delete($des_data);
            }
            $imagePath = time() . '-' . $product->id . 'data.' . $request->image_data->extension();
            $request->image_data->move(public_path('storage/images/products_data'), $imagePath);
            $imageData =  ['image_data' => 'images/products_data/' . $imagePath];
        }
        if (request('image')) {
            $des = 'storage/'.$product->image;
            if(File::exists($des)){
                File::delete($des);
            }
            $newImageName =   $imagePath = time() . '-' . $product->id .'.' . $request->image->extension();
            $request->image->move(public_path('storage/images/products_image'), $newImageName);
            $imageArray =  ['image' => 'images/products_image/' . $newImageName];
        }
        $product->update(array_merge(
            $data,
            $imageData ?? [],
            $imageArray ?? []
        ));
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $des = 'storage/'.$product->image;
        $des_data='storage/'.$product->image_data;
        if(File::exists($des)){
            File::delete($des);
        }
        if(File::exists($des_data)){
            File::delete($des_data);
        }
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
