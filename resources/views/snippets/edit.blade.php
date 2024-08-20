@extends('layouts.app')

@section('content')
<x-container>
    <x-forms.form action="{{ route('snippets.update', $snippet) }}">
        @method('PUT')

        <x-forms.top>
            <x-forms.breadcrumb />

            <x-forms.input-text name="title" value="{{ optional($snippet ?? null)->title }}" class="flex-1" />

            <x-forms.button>Update</x-forms.button>
        </x-forms.top>
        
        @include('snippets._editor')        
    </x-form>
</x-container>
@endsection