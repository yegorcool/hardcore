@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-lg text-gray-900 mb-2']) }}>
    {{ $value ?? $slot }}
</label>
