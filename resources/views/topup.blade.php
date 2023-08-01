@extends('layout.master')
@section('content')
<div class="bg-grey-lighter min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
        @if (Session()->has('WalletKurang'))
        <h2 class="text-red-500 text-xl">
            {{Session()->get('WalletKurang')}}
        </h2>
        @endif
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Top Up</h1>
            <form action="/topup" method="POST" onsubmit="return validatemoney(document.getElementById('money').value)">
                @csrf
                @method('put')
                <br>
                <p>Input Amount of Money</p>
                <input type="number" class="block border border-grey-light w-full p-3 rounded mb-4" name="money" id="money"
                    placeholder="Amount of money" required/>
                <button type="submit"
                    class="w-full text-center bg-green-400 py-3 rounded-md text-white hover:bg-blue-400">Top up</button>
            </form>
        </div>
    </div>
    <script>
        function validateWallet(money){
            if(wallet < price){
                alert("Not Enough Money!");
                return false;
            }
            return true;
        }
    </script>
@endsection
