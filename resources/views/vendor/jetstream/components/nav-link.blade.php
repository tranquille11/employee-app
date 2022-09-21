@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-700 text-sm font-bold text-indigo-700 font-medium leading-5
            focus:outline-none
            focus:border-indigo-700 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-semibold leading-5
            hover:text-indigo-700 hover:border-indigo-700 focus:outline-none focus:text-indigo-700 focus:border-indigo-700 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
