@extends('layouts.app')

@section('content')
<form action="{{ route('snippets.store') }}" method="POST">
    @csrf

    <div class="flex border-l-2 border-indigo-500">
        @include('snippets._form')

        <div class="min-w-40 p-4">
            <input 
                type="submit" 
                value="Create"
                class="bg-indigo-500 text-indigo-50 w-full py-2 rounded text-ls uppercase cursor-pointer"
            >
        </div>
    </div>
</form>
@endsection