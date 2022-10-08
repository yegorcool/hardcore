<!-- Modal Login -->
<div class="modal fade bg-black/80" id="loginModal" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-body modal-content bg-transparent border-none">
            <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                        <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
                    </a>
                </x-slot>
                @include('auth.login-form')

                <div class="login-footer">
                    <p data-bs-target="#registerModal" data-bs-toggle="modal" data-bs-dismiss="modal">
                        {{ __('Еще не зарегистрированы?') }}
                        <a href="{{ route('register') }}"
                           class="text-themeRed font-semibold hover:text-themeOrange  cursor-pointer">
                            {{ __('Зарегистрироваться') }}
                        </a>
                    </p>
                </div>
            </x-auth-card>
        </div>
    </div>
</div>
