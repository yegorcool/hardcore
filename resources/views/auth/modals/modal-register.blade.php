<!-- Modal Register-->
<div class="modal fade bg-black/80" id="registerModal" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body modal-content bg-transparent border-none">
            <x-auth.card>
                <x-slot name="logo">
                    <a href="/">
                        <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
                    </a>
                </x-slot>
                @include('auth.register-form')

                <div class="login-footer">
                    <p data-bs-target="#loginModal" data-bs-toggle="modal" data-bs-dismiss="modal">
                        {{ __('Уже зарегистрированы?') }}
                        <a href="{{ route('login') }}"
                           class="text-themeRed font-semibold hover:text-themeOrange cursor-pointer">
                            {{ __('Войти') }}
                        </a>
                    </p>
                </div>
            </x-auth.card>
        </div>
    </div>
</div>
