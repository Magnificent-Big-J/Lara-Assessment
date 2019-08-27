@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product</div>

                    <div class="card-body">
                        <a href="{{route('products.create')}}" class="btn btn-info mb-2">Add New Product</a>
                        <table class="table">
                            <thead>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Discount Percentage</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>R {{$product->price}}</td>
                                        <td>{{$product->discountPerc}}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm mb-2">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
