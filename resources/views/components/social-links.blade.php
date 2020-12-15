<div class="block">
    <ul class="flex items-center justify-center -ml-2">
        @foreach($links as $name => $link)
            @continue(! $link)
            <li class="py-1 ml-2 pl-2">
                <a
                    href="{{ $link }}"
                    class="text-{{ $name }} block transform origin-bottom transition-all duration-200 ease-in-out hover:-translate-y-1 hover:scale-105"
                >
                    <i class="fab text-lg {{ 'fa-' . $name }}" aria-hidden="true"></i>
                </a>
            </li>
        @endforeach
    </ul>
</div>
