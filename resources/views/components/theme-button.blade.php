<div class="d-flex align-items-center">
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'theme-btn block w-4/5 text-centre mx-auto my-6']) }}><i class="far fa-paper-plane mr-1"></i>
        {{ $slot }}
    </button>
</div>
