<section class="game-heading relative "
         @if ($game->head_image)
             style="background-image: url({{asset($game->head_image)}});"
             @else
             style=" background-image: url('../images/event{{rand(1,7)}}.jpg');"
@endif
>
<div class="game-heading__wrapper min-h-[75vh]  md:min-h-[90vh] ">
    <div class="flex flex-col  items-center  justify-end game-heading__title-block min-h-[70vh] md:min-h-[90vh]">
        <div class=" flex justify-center items-center flex-wrap  py-10 md:mb-12 xl:mb-0 lg:bg-black lg:w-full">
            <h4 class="heading__title text-center">
                {{ $game->members[0]->name }} </h4>
            <div class="w-full lg:w-auto text-center lg:mx-5"><span class="heading-divider">  </span></div>
            <h4 class="heading__title text-center">
                {{ $game->members[1]->name }}
            </h4>
        </div>
    </div>
</div>
</section>
