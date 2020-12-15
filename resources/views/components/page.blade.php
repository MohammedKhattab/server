@props([
    'pageName', 'centered' => true
])

<x-layout :page-name="$pageName">
    <div class="container">
        <div class="bg-white overflow-hidden shadow-lg rounded px-6 py-8{{ $centered ? ' text-center' : '' }}">
            <div class="prose-sm md:prose-lg">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
