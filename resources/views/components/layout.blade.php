<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="baseURL" content="{{ url('/') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <x-social-media-meta
        title="{{ $settings->value('site.name', 'ديجيتال إيجنت') }} — {{ $pageName ?? '' }}"
        :description="$settings->value('seo.description')"
        :keywords="$settings->value('seo.keywords')"
        :image="$settings->image('seo.image')"
    ></x-social-media-meta>

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200 relative">
<div id="app" class="min-h-screen flex flex-col justify-between py-10">
    <!-- HEADER -->
    <header class="container">
        <div class="grid gap-3 grid-cols-none md:grid-cols-7">
            <div class="flex md:block items-center justify-center md:col-span-1 row-span-1">
                <x-logo logo="{{ $settings->logo() }}"
                        title="{{ $settings->value('site.name', 'ديجيتال إيجنت') }}"></x-logo>
            </div>

            <div class="flex flex-col justify-between md:col-span-3 row-span-1">
                <x-nav-links></x-nav-links>
            </div>

            @if ($advertisements->count())
                <div class="row-span-1 md:col-span-3">
                    <carousel :ads="{{ $advertisements }}"></carousel>
                </div>
            @endif
        </div>
    </header>

    <!-- CONTENT -->
    <main class="flex-1 mb-6 mt-8 md:mt-16">
        {{ $slot }}
    </main>

    <!-- FOOTER -->
    <x-footer>
        <div>
            {!! $settings->value('site.copyright', 'جميع الحقوق محفوظة لدى ديجيتال إيجينت &copy;') !!}
            <div class="block">
                <x-social-links :links="$settings->socialLinks()"></x-social-links>
            </div>
        </div>
    </x-footer>
</div>

<script src="{{ mix('js/app.js') }}"></script>
@if($message = session()->get('message'))
    <script>
        window.Swal.fire({
            icon: 'success',
            title: '{{ $message['title'] }}',
            text: '{{ $message['text'] }}',
            confirmButtonText: 'فهمت، تابع استخدام التطبيق'
        })
    </script>
@endif
</body>
</html>
