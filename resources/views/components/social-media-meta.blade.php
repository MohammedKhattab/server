@props([
'title', 'description', 'keywords',
'card' => 'summary_large_image',
'image' => false
])

<!-- Primary Meta Tags -->
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
<meta name="keywords" content="{{ $keywords }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
@if($image)
    <meta property="og:image" content="{{ $image }}">
@endif

<!-- Twitter -->
<meta property="twitter:card" content="{{ $card }}">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
@if($image)
    <meta property="twitter:image" content="{{ $image }}">
@endif
