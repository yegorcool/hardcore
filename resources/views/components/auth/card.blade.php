<div class=" flex flex-col sm:justify-center items-center pt-6 pb-4 sm:pt-10 bg-transparent">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-8 px-8 py-6 bg-black bg-black shadow-xl shadow-white/30 text-gray-400 overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
