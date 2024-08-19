<form class="w-full" action="{{ $action }}" method="POST">
    @csrf

    {{ $slot }}
</form>