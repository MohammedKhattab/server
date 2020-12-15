@if($logo)
    <img src="{{ $logo }}" alt="{{ $title }}" class="mx-auto md:mr-0 h-24">
@else
    {{ $title }}
@endif
