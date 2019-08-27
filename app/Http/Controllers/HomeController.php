<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales = Sale::orderBy('id','desc')->take(5)->get();
        $customer = User::where('type',User::USER_TYPE_CUSTOMER)->count();
        $admins = User::where('type',User::USER_TYPE_ADMIN)->count();
        $months = Sale::whereBetween('created_at', [
        \Carbon\Carbon::now()->firstOfMonth()->toDateTimeString(),
            \Carbon\Carbon::now()->lastOfMonth()->toDateTimeString()])->get();
        $sum = 0;
        foreach ($months as $month){
            $sum += $month->product->price - ($month->product->price * $month->product->discountPerc);
        }

        return view('home',compact('sales','sum','customer','admins'));
    }
}
