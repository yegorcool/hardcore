@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'shadow-sm bg-white/5 border-b-gray-200 text-gray-200 focus:border-white focus:bg-gray-600']) !!}>
