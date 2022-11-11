@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg text-gray-50 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
