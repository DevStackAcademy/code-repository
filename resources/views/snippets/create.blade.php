@extends('layouts.app')

@section('content')
<x-container>
    <x-forms.form action="{{ route('snippets.store') }}">

        <x-forms.top>
            <x-forms.label />

            <x-forms.input-text name="title" value="{{ optional($snippet ?? null)->title }}" />

            <x-forms.button>Save</x-forms.button>
        </x-forms.top>
        
        @include('snippets._editor')        
    </x-form>
</x-container>
@endsection