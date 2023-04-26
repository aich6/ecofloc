@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex no-underline font-bold items-center px-1 pt-1 border-b-2 border-[#85502e] text-lg font-medium leading-5 text-[#001379] focus:outline-none focus:border-indigo-700 transition'
            : 'inline-flex no-underline font-bold items-center px-1 pt-1 border-b-2 border-transparent text-lg font-medium leading-5 text-[#001379] hover:text-[#001379] hover:border-[#85502e] focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
