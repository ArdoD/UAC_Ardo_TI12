@extends('layout.master')
@section('content')
    <div class="bg-grey-lighter min-h-screen flex flex-col">
        <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
            <div class="rounded bg-white px-6 py-8 rounded shadow-md text-black w-full my-10">
                <h1 class="mb-8 text-3xl text-center">Sign up</h1>

                <form action="/register" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="name"
                        placeholder="Full Name" required />
                    @error('name')
                        <p class="text-red-600 text-xl">
                            {{$message}}
                        </p>
                    @enderror
                    <input type="password" class="block border border-grey-light w-full p-3 rounded mb-4" name="password"
                        placeholder="Password" required />
                    @error('password')
                        <p class="text-red-600 text-xl">
                            {{$message}}
                        </p>
                    @enderror
                    <div class="my-4">
                        <input type="radio" name="gender" id="L" value="L" required>
                        <label for="L">Men</label>
                        <input type="radio" name="gender" id="P" value="P" required>
                        <label for="P">Women</label>
                        @error('gender')
                        <p class="text-red-600 text-xl">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="workone"
                        placeholder="Work Interest 1" required />
                    @error('workone')
                        <p class="text-red-600 text-xl">
                            {{$message}}
                        </p>
                    @enderror
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="worktwo"
                        placeholder="Work Interest 2" required />
                    @error('worktwo')
                        <p class="text-red-600 text-xl">
                            {{$message}}
                        </p>
                    @enderror

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="workthree"
                        placeholder="Work Interest 3" required />
                    @error('workthree')
                        <p class="text-red-600 text-xl">
                            {{$message}}
                        </p>
                    @enderror

                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="linkedin"
                        placeholder="Linkedin Username" required />
                    @error('linkedin')
                        <p class="text-red-600 text-xl">
                            {{$message}}
                        </p>
                    @enderror
                    <input type="text" class="block border border-grey-light w-full p-3 rounded mb-4" name="phone"
                        placeholder="Phone Number" required />
                    @error('phone')
                        <p class="text-red-600 text-xl">
                            {{$message}}
                        </p>
                    @enderror
                    <input type="number" class="block border border-grey-light w-full p-3 rounded mb-4" name="wallet"
                    placeholder="Your Amount of Money" required />

                    <input type="file" class="block border border-grey-light w-full p-3 rounded mb-4" name="image"
                        placeholder="image" required />

                    <button type="submit"
                        class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">Create
                        Account</button>
                </form>
                <div class="text-grey-dark mt-6">
                    Already have an account?
                    <a class="no-underline border-b border-blue text-blue" href="../login/">
                        Log in
                    </a>.
                </div>
            </div>
        </div>
    @endsection
