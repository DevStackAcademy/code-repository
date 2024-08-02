@extends('layouts.app')

@section('content')
<form action="{{ route('snippets.update', $snippet) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="flex border-l-2 border-indigo-500">
        @include('snippets._form')

        <div class="min-w-40 p-4 flex flex-col justify-between">
            <input 
                type="submit" 
                value="Update"
                class="bg-indigo-500 text-indigo-50 w-full py-2 rounded text-ls uppercase cursor-pointer"
            >

            <a 
                href="#"
                onclick="event.preventDefault(); document.getElementById('fork').submit();"
                class="block text-center text-indigo-500 hover:underline text-ls uppercase cursor-pointer"
            >
                Fork
            </a>
        </div>
    </div>
</form>

<form action="{{ route('snippets.fork', $snippet) }}" method="POST" id="fork">
    @csrf
</form>
@endsection