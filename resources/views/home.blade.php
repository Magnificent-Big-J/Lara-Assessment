@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Customers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$customer}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-share-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sales</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">R {{$sum}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-share-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admins</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$admins}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="far fa-share-square fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-stripped">
                                <thead>
                                    <th>Product Name</th>
                                    <th>Purchase Date</th>
                                    <th>Price</th>
                                    <th>Discount %</th>
                                    <th>Amount</th>
                                </thead>
                                <tbody>
                                    @foreach($sales as $sale)
                                        <tr>
                                            <td>{{$sale->product->name}}</td>
                                            <td>{{$sale->purchase_date}}</td>
                                            <td>R {{$sale->product->price}}</td>
                                            <td>{{$sale->product->discountPerc}}</td>
                                            <td>R {{$sale->product->price - ($sale->product->discountPerc * $sale->product->price)}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
