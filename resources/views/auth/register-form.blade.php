<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="hidden" name="role" value="buyer">
    <div class="flex justify-center mb-2">
        <h3 class="text-2xl items-center  text-gray-100"  id=registerLabel">Зарегистрироваться</h3>
        {{--                <img src="/hardcore-fight-icon.png" width="40" height="40"  alt="" class="inline-block">--}}
    </div>
    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Имя')"/>

        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                      autofocus/>

        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Электронная почта')"/>

        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                      required/>

        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
    </div>

    <!-- Password -->
    <div class="mt-4">
        <x-input-label for="password" :value="__('Пароль')"/>

        <x-text-input id="password" class="block mt-1 w-full"
                      type="password"
                      name="password"
                      required autocomplete="new-password"/>

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
    <div class="form-group mt-2">
        <input class="custom-checkbox focus:ring checked:bg-themeRed text-themeRed focus:ring-themeRed focus:ring-opacity-40 rounded" type="checkbox" value="" id="agree">
        <label class="form-check-label items-center inline-block" for="agree">
            {{ __(' Я принимаю ') }} <a class="text-themeRed font-semibold hover:text-themeOrange" href="#">{{ __('Правила пользования сайтом') }}</a>
        </label>
    </div>
    <div class="" >
        <x-theme-button class="theme-btn bg-themeRed" >
            {{ __('Зарегистрироваться') }}
        </x-theme-button>
    </div>

</form>
