@extends('layouts.app')

@section('content')
<form action="{{ route('snippets.store') }}" method="POST">
    @csrf

    @include('snippets._form')
</form>
@endsection