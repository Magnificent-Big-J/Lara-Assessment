<?php

namespace App\Http\Controllers;

use App\Http\Resources\TopUpHistoryResource;
use App\topUpHistory;
use Illuminate\Http\Request;
use App\TopUp;
class TopUpHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $myTopUp = TopUp::where('user_id',auth()->user()->id)->get();
        return response()->json($myTopUp[0]->amount
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\topUpHistory  $topUpHistory
     * @return \Illuminate\Http\Response
     */
    public function show(topUpHistory $topUpHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\topUpHistory  $topUpHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(topUpHistory $topUpHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\topUpHistory  $topUpHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, topUpHistory $topUpHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\topUpHistory  $topUpHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(topUpHistory $topUpHistory)
    {
        //
    }
    public function historicData(){
        $history = topUpHistory::where('user_id',auth()->user()->id)->get();

        return response()->json(TopUpHistoryResource::collection($history)
            ,200);
    }
}
