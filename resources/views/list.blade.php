@extends('layout.master')
@section('content')
        <div class="row mt-10">
            <h1 style="font-size: 25px; color: black;">Your Friend</h1>
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

                            <form action='delete-friend/{{$user->id}}' method="POST">
                                @csrf
                                <a href="delete-friend/{{$user->id}}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    {{__('form.delete')}}
                                </a>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
