@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' shadow-sm border-gray-300 focus:border-[#da1d25] focus:opacity-50']) !!}>
