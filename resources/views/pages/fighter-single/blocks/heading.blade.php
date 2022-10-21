<section class="heading "
         @if( $fighter->hero_image )
             style="background-image:  url('{{asset( $fighter->hero_image )}}'); background-position-y: 80px;"
         @else
             style="background-image:url('{{asset("images/slider-boxing-".$num.".jpg")}}')  ;"
         @endif
>
    <div class=" wrapper  min-h-[95vh]  lg:min-h-[90vh] ">
        <div class="heading__title-block min-h-[75vh]   flex flex-col justify-end md:justify-center items-center">
            <div
                class="  lg:mr-56 py-10 lg:flex lg:flex-col justify-center items-center  mb-20 md:mb-0
{{--                @if( $fighter->hero_image )bg-black/30 @endif--}}
                rounded-xl px-4">
                <h2 class="heading__title mb-3">
                    {{ $fighter->name }}
                </h2>
                <div class="heading__sub-title mb-2">
                    Дорогу осилит идущий.
                </div>
                <div class="heading-divider"></div>
            </div>
        </div>
    </div>
</section>

