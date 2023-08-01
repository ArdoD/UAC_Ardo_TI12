@extends('layout.master')
@section('content')
        <div class="row mt-10">
            <h1 style="font-size: 25px; color: black;">All People around ConnectFriend</h1>
            <br>
            <div class="">
                <h1>Your Money : {{auth()->user()->wallet}}</h1>
                <br>
                <a href="/topup" class="button bg-green-600 text-white px-4 py-3">
                    Topup
                </a>
                <br>
                <br>
                <form action="/topupInstant" method='post'>
                @csrf
                @method('put')
                    <button type="submit" class="button bg-green-600 text-white px-4 py-3">
                        Instantly add 100 coins
                    </button>
                </form>
            </div>
            <br>
            <div class="grid grid-cols-3">
                @foreach ($user as $user)
                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow my-5">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ asset('storage/'.$user->image)}}" alt="" />
                        </a>
                        <div class="p-5">
                            <h1 class="text-2xl">
                                {{$user->name}}
                            </h1>
                            <div class="flex justify-between">
                                <p class="mb-3 font-normal">
                                    {{__('form.title')}} : {{$user->workone}}
                                </p>
                            </div>

                            <form action='add-friend/{{$user->id}}' method="POST">
                                @csrf
                                <a href="add-friend/{{$user->id}}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    {{__('form.like')}}
                                </a>
                            </form>
                            {{-- <a href="/developer/edit-game/{{$user->id}}"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Delete
                            </a> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
