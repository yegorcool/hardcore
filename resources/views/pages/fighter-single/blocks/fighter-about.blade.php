<section class="fighter-about bg-black min-h-[80vh] max-w-7xl mx-auto lg:flex items-start container-fluid">
    <div class="fighter-about__wrapper relative px-4 w-full lg:p-8 mb-8 md:flex justify-between items-start col-lg-9">
        <div class="fighter-about__text-block md:w-1/2 pb-10 text-gray-50 z-10">
            <h2 class="fighter-about__title text-white  mb-10">
                Биография
            </h2>
            <div class="fighter-about__text text-gray-50">
                <p class="text-gray-50">
                    {{ $fighter->description }}
                </p>
            </div>
            <table class="table table-striped border-indigo-400 my-4 table-fixed w-full bg-gray-800 max-w-[500px]">
                <tbody>
                <tr>
                    <td class="w-60"><span>Вес</span></td>
                    <td>{{ $fighter->weight }}</td>
                </tr>
                <tr>
                    <td><span>Рост</span></td>
                    <td>{{ $fighter->height }}</td>
                </tr>
                <tr>
                    <td><span>Город</span></td>
                    <td>{{ $fighter->city }}</td>
                </tr>
                <tr>
                    <td><span>Национальность</span></td>
                    <td>Россия</td>
                </tr>
                </tbody>
            </table>
        </div>
        <figure class="flex flex-col align-items-center md:w-1/3 mx-auto">
            <img class="fighter-about__image block"
                 src="@if($fighter->gallery_images){{ asset($fighter->gallery_images[0]) }}@else/images/boxing-{{ $num }}.jpg @endif"
                 width="360" height="414"
                 alt="Фото бойца">
            <figcaption class="fighter-about__caption text-left">{{ $fighter->name }}</figcaption>
        </figure>

    </div>
    <div class="sm:flex flex-wrap justify-between lg:block col-lg-3 py-4">
        <div class="p-3 w-full sm:w-1/2 lg:w-[90%] mb-4">
            <a href="{{ route('register') }}" class="theme-btn w-full">
                <div class="service-icon">
                    <i class="flaticon-play-button"></i>
                </div>
                Записать видео
            </a>
        </div>
        <div class="p-3  sm:w-1/2 lg:w-[90%] mb-4">
            <a href="{{ route('register') }}" class="theme-btn  w-full">
                <div class="service-icon">
                    <i class="flaticon-sports"></i>
                </div>
                Поддержать бойца
            </a>
        </div>
        <div class="p-3  sm:w-1/2 lg:w-[90%] mb-4">
            <a href="{{ route('register') }}" class="theme-btn  w-full">
                <div class="service-icon">
                    <i class="flaticon-award-1"></i>
                </div>
                Поздравить <br> с победой
            </a>
        </div>
        <div class="p-3  sm:w-1/2 lg:w-[90%] mb-4">
            <a href="{{ route('register') }}" class="theme-btn  w-full">
                <div class="service-icon">
                    <i class="flaticon-money-bag"></i>
                </div>
                Поздравить <br> c Днём Рождения
            </a>
        </div>
    </div>
</section>
