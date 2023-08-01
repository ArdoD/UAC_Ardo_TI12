<?php

namespace App\Http\Controllers;

use App\Models\FriendList;
use App\Models\User;
use Illuminate\Http\Request;

class FriendListController extends Controller
{
    public function store($friend_id){
        // $friend = FriendList::findOrFail($friend_id);
        // $user = User::find(auth()->user()->id);
        $friendlist = new FriendList();
        $friendlist->user_id = auth()->user()->id;
        $friendlist->friend_id = $friend_id;
        $friendlist->save();
        return redirect('/list');
    }

    public function index(){
        $user = FriendList::where('user_id', auth()->user()->id)->get();
        // $user = User::where('id', $friend)->get();
        return view('list', compact('user'));
    }

    public function delete($friend_id){
        $friend = FriendList::Find($friend_id);
        // Storage::delete($friend->image);
        $friend->delete();
        return redirect('/list');
    }
}
