<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show(){
        return view("payment");
    }

    public function store(Request $request){
        $money = User::find(auth()->user()->id);
        // $money = auth()->user()->wallet;
        $money->wallet = $money->wallet + $request->money;
        $money->wallet = $money->wallet - 120000;
        $money->update();
        return redirect('/home');
        // return redirect()->back()->with('error', 'You already have this Game');
    }

    public function topup(Request $request){
        $money = User::find(auth()->user()->id);
        // $money = auth()->user()->wallet;
        $money->wallet = $money->wallet + $request->money;
        $money->update();
        return redirect('/home');
    }

    public function topupPage(){
        return view("topup");
    }
}
