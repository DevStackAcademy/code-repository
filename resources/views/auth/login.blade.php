@extends('layouts.app')

@section('content')
<x-container>
    <div class="h-screen w-full flex items-center justify-center">
        <div class="space-y-6 flex flex-col items-center bg-gray-800 rounded p-12 shadow">
            <h2 class="text-4xl">Login</h2>

            <p class="text-xs">
                Login to create and manage your snippets.
            </p>

            <a href="{{ route('auth.github') }}" class="bg-gray-900 px-4 py-2 rounded flex items-center justify-center gap-2 block w-full shadow">
                <x-rocket-logo />
                Login with GitHub
            </a>
        </div>
    </div>
</x-container>
@endsection