<x-guest-layout>
    <div class="min-h-screen">
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-hardcore-fc-logo class="w-56 h-16 fill-current text-gray-400"/>
                </a>
            </x-slot>

            <div class="mb-4 text-sm text-gray-600">
                {{ __('Спасибо за регистрацию! Прежде чем начать, не могли бы вы подтвердить свой адрес электронной почты, перейдя по ссылке, которую мы только что отправили вам по электронной почте? Если вы не получили электронное письмо, мы с радостью вышлем вам другое.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('На адрес электронной почты, который вы указали при регистрации, была отправлена новая ссылка для подтверждения.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Выслать повторно письмо для подтверждения') }}
                        </x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Выйти') }}
                    </button>
                </form>
            </div>
        </x-auth-card>
    </div>
</x-guest-layout>
