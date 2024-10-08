<div class="sm:h-screen flex flex-col sm:flex-row gap-4">
    <div class="sm:w-2/3">
        {{ $slot }}
    </div>    

    <div class="sm:w-1/3 overflow-y-auto">
        <ul>
            <li class="text-gray-500 uppercase mb-4 mt-2">
                Snippets
            </li>
            @foreach ($snippets as $snippet)
                <li class="mb-2">
                    <a 
                        href="{{ route('snippets.show', $snippet) }}" 
                        class="text-indigo-500 hover:underline"
                    >
                        &rang; 
                        {{ $snippet->title }}
                    </a>
                </li>
            @endforeach
        </ul>            
    </div>
</div>