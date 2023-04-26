@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number:</strong>
                    <input type="text" name="Number" value="{{ $product->Number }}" class="form-control" placeholder="Number">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Year:</strong>
                    <input type="text" name="Year" value="{{ $product->Year }}" class="form-control" placeholder="Year">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>PRODUCT:</strong>
                    <input type="text" name="PRODUCT" value="{{ $product->PRODUCT }}" class="form-control" placeholder="PRODUCT">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CONDUCTOR_TYPE:</strong>
                    <input type="text" name="CONDUCTOR_TYPE" value="{{ $product->CONDUCTOR_TYPE }}" class="form-control" placeholder="CONDUCTOR_TYPE">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>SINGLE_MULTICORE:</strong>
                    <input type="text" name="SINGLE_MULTICORE" value="{{ $product->SINGLE_MULTICORE }}" class="form-control" placeholder="SINGLE_MULTICORE">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>SHIELDED_UNSHIELDED:</strong>
                    <input type="text" name="SHIELDED_UNSHIELDED" value="{{ $product->SHIELDED_UNSHIELDED }}" class="form-control" placeholder="SHIELDED_UNSHIELDED">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>SHIELDING_TYPE:</strong>
                    <input type="text" name="SHIELDING_TYPE" value="{{ $product->SHIELDING_TYPE }}" class="form-control" placeholder="SHIELDING_TYPE">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>INSULATION_TYPE:</strong>
                    <input type="text" name="INSULATION_TYPE" value="{{ $product->INSULATION_TYPE }}" class="form-control" placeholder="INSULATION_TYPE">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>INSULATION_THICKNESS:</strong>
                    <input type="text" name="INSULATION_THICKNESS" value="{{ $product->INSULATION_THICKNESS }}" class="form-control" placeholder="INSULATION_THICKNESS">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>VOLTAGE_LEVEL:</strong>
                    <input type="text" name="VOLTAGE_LEVEL" value="{{ $product->VOLTAGE_LEVEL }}" class="form-control" placeholder="VOLTAGE_LEVEL">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ABRASION:</strong>
                    <input type="text" name="ABRASION" value="{{ $product->ABRASION }}" class="form-control" placeholder="ABRASION">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CHEMICAL_RESISTANCE:</strong>
                    <input type="text" name="CHEMICAL_RESISTANCE" value="{{ $product->CHEMICAL_RESISTANCE }}" class="form-control" placeholder="CHEMICAL_RESISTANCE">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>FLEXIBILITY:</strong>
                    <input type="text" name="FLEXIBILITY" value="{{ $product->FLEXIBILITY }}" class="form-control" placeholder="FLEXIBILITY">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>TEMPERATURE_CLASS:</strong>
                    <input type="text" name="TEMPERATURE_CLASS" value="{{ $product->TEMPERATURE_CLASS }}" class="form-control" placeholder="TEMPERATURE_CLASS">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>cut view:</strong>
                    <input type="file" name="image" value="{{ $product->image }}" class="form-control" placeholder="image">
                    @if($product->image)
                    <img class="mt-4" src="{{ asset('storage/'.$product->image)}} " alt="" width="200px">
                    @else
                    <span class="info">No image found</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>data image:</strong>
                    <input type="file" name="image_data" value="{{ $product->image_data }}" class="form-control" placeholder="image_data">
                    <img class="mt-4" src="{{ asset('storage/'.$product->image_data)}} " alt="" width="400px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
