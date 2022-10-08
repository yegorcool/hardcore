<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
            </a>
        </x-slot>
        @include('auth.register-form')

        <div class="login-footer">
            <p>{{ __('Уже зарегистрированы?') }} <a class="text-themeRed font-semibold hover:text-themeOrange" href="{{ route('login') }}">{{ __('Войти') }}</a></p>
        </div>
    </x-auth-card>
</x-guest-layout>
