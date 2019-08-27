<?php

namespace App\Http\Controllers;

use App\TopUp;
use Illuminate\Http\Request;
use App\topUpHistory;
class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


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
        $this->validate($request,[
            'amount'=>'required'
        ]);
        $can = $this->insertOrUpdate();

        if($can){
            $topUp = TopUp::find($can);
            $topUp->amount += $request->amount;
            $topUp->save();
        }
        else{
            TopUp::create([
                'amount'=>$request->amount,
                'user_id'=>auth()->user()->id
            ]);

        }


        topUpHistory::create([
            'amount'=> $request->amount,
            'user_id'=> auth()->user()->id,
            'topUpDate'=> \Carbon\Carbon::now(),

        ]);
        $message = 'Top Up of R '. $request->amount . ' is successfully made';
        return response()->json($message,200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function show(TopUp $topUp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function edit(TopUp $topUp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TopUp $topUp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TopUp  $topUp
     * @return \Illuminate\Http\Response
     */
    public function destroy(TopUp $topUp)
    {
        //
    }
    protected function insertOrUpdate(){

        if(TopUp::where('user_id',auth()->user()->id)->count()){
            $topUp = TopUp::where('user_id',auth()->user()->id)->get();
            return $topUp[0]->id;
        }
        return false;
    }
}
