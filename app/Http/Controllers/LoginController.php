<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function store(Request $request){
        $validate = $request->validate ([
            'name' => 'required',
            'gender' => 'required',
            'password' => 'required',
            'workone' => 'required',
            'worktwo' => 'required',
            'workthree' => 'required',
            'linkedin' => 'required|unique:users',
            'phone' => 'required|min:11|numeric',
            'image' => 'required|image|file',
            'wallet' => 'required'
        ]);

        $validate['image'] = $request->file('image')->store();
        $validate['password'] = bcrypt($validate['password']);
        User::create($validate);

        // if($validate['wallet'] <= 120000){
        //     return redirect("/login")->with('WalletKurang', "Your money is not enough, Add your money and pay");
        // }
        return redirect("/login")->with('registerSuccess', "You Success Register");
    }

    public function login(Request $request){
        $validate = $request->validate([
            'password' => 'required',
            'linkedin' => 'required',
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            // if($validate['wallet'] <= 120000){
            //     return redirect("/payment")->with('WalletKurang', "Your money is not enough, Add your money and pay");
            // }
            return redirect('/payment');
        }
        return redirect()->back()->with('loginError', "Login Failed!");
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }
}
