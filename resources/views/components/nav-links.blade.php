<nav class="-mx-6 sm:mx-0">
    <ul class="flex space-x-reverse space-x-3 mb-3 flex-wrap justify-center">
        @foreach($links as $link)
            <li>
                <a
                    href="{{ $link['url'] }}"
                    class="block text-gray-700 text-sm pb-3 border-b border-transparent {{ $link['active'] ? 'text-gray-900 border-indigo-300' : 'hover:text-gray-900 hover:border-indigo-300' }}"
                >
                    {{ $link['text'] }}
                </a>
            </li>
        @endforeach
    </ul>
</nav>
