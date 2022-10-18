<section class=" bg-black  max-w-7xl mx-auto">
    <div class=" relative px-4 lg:p-12 mb-8 ">
        <div class=" pb-10 text-gray-50 z-10">
            <h5 class="fighter-about__title text-white  mt-10 mb-10">
                О поединке
            </h5>
            <div class="fighter-about__text text-gray-50 pl-10">
                <p class="">
                    Поединок состоится {{$game->datetime->format('d.m.Y')}}
                </p>
                <p class="">
                    Начало в {{$game->datetime->format('H:i')}}
                </p>
                <p>
                    Место проведения: {{$game->place}}, город {{$game->city}}
                </p>
            </div>
        </div>
    </div>
</section>
