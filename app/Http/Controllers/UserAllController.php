<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserAllController extends Controller
{
    public function index(){
        $user = User::where('workone', auth()->user()->workone)->get();
        return view('home', compact('user'));
    }
}
