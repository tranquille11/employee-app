<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @livewireStyles
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
</head>
<body class="font-sans antialiased">
<x-jet-banner />

<div class="min-h-screen bg-gray-200">
    @livewire('navigation-menu')

    <!-- Page Heading -->

    <header class="bg-gray-100 shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if (request()->is('admin*'))
                <div class="flex text-black">
                    <div class="mr-5 py-1 font-semibold {{request()->routeIs('employees*') ? 'font-bold text-indigo-700' :''}}">
                        <span class="text-sm  leading-tight hover:text-indigo-600">
                            <a href="#">
                            {{ __('Employees') }}
                            </a>
                        </span>
                    </div>
                    <div class="mr-5 py-1 {{request()->routeIs('roles-permission*') ? 'font-bold text-indigo-700' : ''}}">
                        <span class="text-sm leading-tight hover:text-indigo-600">
                        <a href="#">
                            {{ __('Roles and Permissions') }}
                            </a>
                         </span>
                    </div>
                    <div class="mr-5 py-1 {{request()->routeIs('brands*') ? 'font-bold text-indigo-700' : ''}}">
                        <span class="text-sm leading-tight hover:text-indigo-600">
                        <a href="#">
                            {{ __('Brands') }}
                            </a>
                         </span>
                    </div>
                </div>
            @endif
                @if (request()->is('imports*'))
                    <div class="flex text-black">
                        <div class="mr-5 py-1 {{request()->routeIs('talkdesk') ? 'font-bold text-indigo-700' :''}}">
                        <span class="text-sm  leading-tight hover:text-indigo-600">
                            <a href="#">
                            {{ __('Talkdesk') }}
                            </a>
                        </span>
                        </div>
                        <div class="mr-5 py-1 {{request()->routeIs('shopify') ? 'font-bold text-indigo-700' : ''}}">
                        <span class="text-sm leading-tight hover:text-indigo-600">
                        <a href="#">
                            {{ __('Shopify') }}
                            </a>
                         </span>
                        </div>
                        <div class="mr-5 py-1 {{request()->routeIs('fondue') ? 'font-bold border-white' : ''}}">
                        <span class="text-sm leading-tight hover:text-indigo-600">
                        <a href="#">
                            {{ __('Fondue') }}
                            </a>
                         </span>
                        </div>
                        <div class="mr-5 py-1 {{request()->routeIs('gorgias') ? 'font-bold border-white' : ''}}">
                        <span class="text-sm leading-tight hover:text-indigo-600">
                        <a href="#">
                            {{ __('Gorgias') }}
                            </a>
                         </span>
                        </div>
                    </div>
                @endif
        </div>
    </header>


    <!-- Page Content -->
    <main>
        @yield('content')
    </main>
</div>

@stack('modals')
@livewireScripts
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
    FilePond.registerPlugin(FilePondPluginFileValidateType);
    FilePond.registerPlugin(FilePondPluginFileValidateSize);
    FilePond.registerPlugin(FilePondPluginImagePreview);
</script>
</body>
</html>
