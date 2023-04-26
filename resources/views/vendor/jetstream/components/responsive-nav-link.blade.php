@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 no-underline font-bold border-[#85502e] text-base font-medium text-[#85502e] bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 no-underline font-bold border-transparent text-base font-medium text-[#001379] hover:text-[#001379] hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
