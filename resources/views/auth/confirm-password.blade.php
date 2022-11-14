<x-guest-layout>
    <div class="min-h-screen">
        <x-auth.card>
            <x-slot name="logo">
                <a href="/">
                    <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
                </a>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Это безопасная область приложения. Пожалуйста, подтвердите свой пароль, прежде чем продолжить.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Password -->
                <div>
                    <x-form.input-label for="password" :value="__('Пароль')"/>

                    <x-form.text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password"/>

                    <x-form.input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <x-theme-button class="bg-themeRed">
                    {{ __('Подтвердить') }}
                </x-theme-button>
            </form>
        </x-auth.card>
    </div>
</x-guest-layout>
