<x-guest-layout>
    <div class="min-h-screen">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
                </a>
            </x-slot>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Электронная почта')"/>

                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                  :value="old('email', $request->email)" required autofocus/>

                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Пароль')"/>

                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Подтверждение пароля')"/>

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password"
                                  name="password_confirmation" required/>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>

                <x-theme-button class="bg-themeRed">
                    {{ __('Сбросить пароль') }}
                </x-theme-button>
            </form>
        </x-auth-card>
    </div>
</x-guest-layout>
