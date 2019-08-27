<?php

namespace App\Http\Controllers;

use App\Http\Resources\SalesResource;
use App\Sale;
use App\TopUp;
use App\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::where('user_id',auth()->user()->id)->get();

        return response()->json(SalesResource::collection($sales)

            ,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($this->canBuy($request->product_id)){
            $product = Product::find($request->product_id);
            $topUp = TopUp::where('user_id',auth()->user()->id)->get();
            $topUp = TopUp::find($topUp[0]->id);
            $topUp->amount -=  $product->price - ($product->price * $product->discountPerc);
            $topUp->save();
            Sale::create([
                'product_id'=>$request->product_id,
                'user_id'=>auth()->user()->id,
                'purchase_date'=> \Carbon\Carbon::now()
            ]);

            return response()->json(["message"=>"Your purchase is successful"],200);
        }

        return response()->json(["message"=>"You don't have enough money, please top up"],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    protected function canBuy($product_id){
        $product = Product::find($product_id);
        $price = $product->price;
        $topUp = TopUp::where('user_id',auth()->user()->id)->get();
        $amount = $topUp[0]->amount;

        if($amount >= $price){
            return true;
        }

        return false;




    }
}
