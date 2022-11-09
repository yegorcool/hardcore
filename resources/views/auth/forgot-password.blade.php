<x-guest-layout>
    <div class="min-h-screen">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
                </a>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Забыли свой пароль? Без проблем. Просто сообщите нам свой адрес электронной почты, и мы отправим вам ссылку для сброса пароля, которая позволит вам выбрать новый.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Электронная почта')"/>

                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                                  required autofocus/>

                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <x-theme-button class="bg-themeRed">
                    {{ __('Восстановить пароль') }}
                </x-theme-button>
            </form>
        </x-auth-card>
    </div>
</x-guest-layout>
