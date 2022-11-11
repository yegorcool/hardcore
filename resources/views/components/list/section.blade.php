<section class="px-3">
    <div class=" ">
        <div class="md:flex justify-between items-center">
            <div class="md:w-1/2 mb-2 md:mb-0">
                {{ $site_title }}
            </div>
            @isset($help_button)
                <div class="lg:w-1/2 text-right mr-1">
                    {{ $help_button}}
                </div>
            @endisset
        </div>
        <div class="my-2 overflow-x-auto">
            {{ $slot }}
        </div>
        @isset($paginate_link)
            <div class="bg-black text-themeOrange list__paginate">
                {{ $paginate_link }}
            </div>
        @endisset

    </div>
</section>
