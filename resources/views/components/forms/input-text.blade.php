<input 
    type="text" 
    name="{{ $name }}" 
    id="{{ $name }}" 
    value="{{ old('title', $value) }}" 
    class="w-full bg-transparent border-b border-gray-500 focus:outline-none"
    placeholder="{{ ucfirst($name) }}"
>