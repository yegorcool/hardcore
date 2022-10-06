<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="flex justify-center mb-2">
                <h3 class="text-2xl items-center">{{ __('Вход') }}</h3>
                {{--                <img src="/hardcore-fight-icon.png" width="40" height="40"  alt="" class="inline-block">--}}
            </div>
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Электронная почта')"/>

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                              required autofocus/>

                <x-input-error :messages="$errors->get('email')" class="mt-2"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Пароль')"/>

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="current-password"/>

                <x-input-error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Remember Me -->
            <div class="flex justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                           class="rounded checked:bg-themeRed text-themeRed focus:ring-themeRed focus:ring-opacity-40 rounded shadow-sm focus:ring "
                           name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
                </label>
                @if (Route::has('password.request'))
                    <a class="text-themeRed hover:text-themeOrange" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
            </div>


            <x-theme-button class="bg-themeRed">
                {{ __('Войти') }}
            </x-theme-button>

            <div class="login-footer">
                <p>{{ __('Еще не зарегистрированы?') }}
                    <a class="text-themeRed font-semibold hover:text-themeOrange" href="{{ route('register') }}">{{ __('Зарегистрироваться') }}</a>
                </p>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
