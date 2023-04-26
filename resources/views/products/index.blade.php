@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success mb-4 mt-4" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

     <table id="example" class="ui celled table " style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>PRODUCT</th>
                <th>Year-Number</th>
                <th>Last Update</th>
                <th>Cut View</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->PRODUCT }}</td>
                <td>{{ $product->Year }}-{{ $product->Number }}</td>
                <td>{{ $product->updated_at }}</td>
                <td> <img  src="{{ asset('storage/'.$product->image)}} " alt="" width="200px"></td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                        @can('product-edit')
                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
<tfoot>
            <tr>
                <th>No</th>
                <th>PRODUCT</th>
                <th>Year-Number</th>
                <th>Last Update</th>
                <th width="280px">Action</th>
            </tr>
        </tfoot>
    </table>


@endsection
