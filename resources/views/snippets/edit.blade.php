@extends('layouts.app')

@section('content')
<form action="{{ route('snippets.update', $snippet) }}" method="POST">
    @csrf
    @method('PUT')

    @include('snippets._form')
</form>
@endsection