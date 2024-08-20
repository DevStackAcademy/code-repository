@extends('layouts.app')

@section('content')
<x-container>
    <x-forms.form action="{{ route('snippets.fork', $snippet) }}">

        <x-forms.top>
            <x-forms.breadcrumb :snippet="$snippet" />

            <x-forms.button>Create Fork</x-forms.button>
        </x-forms.top>
        
        @include('snippets._editor')        
    </x-form>
</x-container>
@endsection