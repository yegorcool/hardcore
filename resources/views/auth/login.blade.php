<x-guest-layout>
    <div class="min-h-screen">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
                </a>
            </x-slot>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>
            @include('auth.login-form')

            <div class="login-footer">
                <p>{{ __('Еще не зарегистрированы?') }}
                    <a class="text-themeRed font-semibold hover:text-themeOrange"
                       href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                </p>
            </div>
        </x-auth-card>
    </div>
</x-guest-layout>
