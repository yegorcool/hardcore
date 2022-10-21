<section class="history bg-gray-200 dark:bg-black py-20 px-4 md:px-8 overflow-hidden">
    <div class="history__wrapper">
        {{--        title-block--}}
        <div class="history__title-block section-title text-center mb-4">
            <h2 class="history__title  title-heading">Боевой <span>опыт</span></h2>
            <p class="history__subtitle title-subheading">Вставай Страна Огромная</p>
        </div>

        {{--        timeline--}}
        <div class="relative timeline__wrapper timeline__animate wow animate__fadeInUp animate__animated"
             data-wow-duration="2000ms" data-wow-delay=100ms" data-wow-offset="50"
        >
            <ul class="timeline__list ">
                @forelse($careerEvents as $item)
                <li class="timeline__row">
                    {{--badge--}}
                    <div class="timeline__badge relative"></div>
                    {{--date--}}
                    <div class="timeline__date">
                        {{ $item->date_start->format('d.m.Y') }} @if($item->date_end)- {{ $item->date_end->format('d.m.Y')}} @endif
                    </div>
                    {{--panel--}}
                    <div class="timeline__panel bg-themeWhite hover:bg-themeRed hover:text-[#ffffff] px-10 shadow-sm">
                        <h4 class="title mb-2 text-xl">{{ $item->title }}</h4>
                        <p class="details">
                            {{ $item->description }}
                        </p>
                    </div>
                </li>
                @empty
{{-- @todo сделать демо заставку, для тех у кого нет истории или скрывать этот блок.
            пока оставляю для презентации--}}
                    <li class="timeline__row">

                        <div class="timeline__badge relative"></div>

                        <div class="timeline__date">
                            June 2020 - June 2022
                        </div>

                        <div class="timeline__panel bg-themeWhite hover:bg-themeRed px-10 shadow-sm">
                            <h4 class="title mb-2 text-xl">Designer</h4>
                            <p class="details">Meis simul clita at qui, dolores quaerendum usu
                                an. Vim at magna quando, omnis disputationi te his, cum maiorum
                                instructior ne. Nec id aperiri labores, usu ut inimicus
                                reprehendunt, laudem labitur mentitum per ut.
                            </p>
                        </div>
                    </li>

                    <li class="timeline__row">

                        <div class="timeline__badge relative"></div>

                        <div class="timeline__date">
                            June 2016 - June 2020
                        </div>

                        <div class="timeline__panel bg-themeWhite hover:bg-themeRed px-10 shadow-sm">
                            <h4 class="title mb-2 text-xl">Gragic Designer</h4>
                            <p class="details">Meis simul clita at qui, dolores quaerendum usu
                                an. Vim at magna quando, omnis disputationi te his, cum maiorum
                                instructior ne. Nec id aperiri labores, usu ut inimicus
                                reprehendunt, laudem labitur mentitum per ut.
                            </p>
                        </div>
                    </li>

                    <li class="timeline__row">
                        <div class="timeline__badge relative"></div>
                        <div class="timeline__date">
                            June 2011 - June 2016
                        </div>

                        <div class="timeline__panel bg-themeWhite hover:bg-themeRed px-10 shadow-sm">
                            <h4 class="title mb-2 text-xl">Photographer</h4>
                            <p class="details">Meis simul clita at qui, dolores quaerendum usu
                                an. Vim at magna quando, omnis disputationi te his, cum maiorum
                                instructior ne. Nec id aperiri labores, usu ut inimicus
                                reprehendunt, laudem labitur mentitum per ut.
                            </p>
                        </div>
                    </li>
                    <li class="timeline__row">
                        <div class="timeline__badge relative"></div>
                        <div class="timeline__date">
                            June 2011 - June 2016
                        </div>

                        <div class="timeline__panel bg-themeWhite hover:bg-themeRed px-10 shadow-sm">
                            <h4 class="title mb-2 text-xl">Photographer</h4>
                            <p class="details">Meis simul clita at qui, dolores quaerendum usu
                                an. Vim at magna quando, omnis disputationi te his, cum maiorum
                                instructior ne. Nec id aperiri labores, usu ut inimicus
                                reprehendunt, laudem labitur mentitum per ut.
                            </p>
                        </div>
                    </li>
{{--Конец демо блока--}}
                @endforelse
            </ul>
        </div>
    </div>
</section>
