<section class="fighter-about bg-black min-h-[80vh] max-w-7xl mx-auto">
    <div class="fighter-about__wrapper relative px-4 lg:p-8 mb-8 md:flex justify-between align-items-center">
        <div class="fighter-about__text-block md:w-1/2 pb-10 text-gray-50 z-10">
            <h2 class="fighter-about__title text-white  -mt-10 mb-10">
                Биография
            </h2>
            <div class="fighter-about__text text-gray-50">
                <p class="text-gray-50">
                    {{ $fighter->description }}
                </p>
            </div>
            <table class="table table-striped border-indigo-400 my-4 table-fixed w-full bg-gray-800 max-w-[500px]" >
                    <tbody>
                    <tr>
                        <td class="w-60"><span >Вес</span></td>
                        <td>{{ $fighter->weight }}</td>
                    </tr>
                    <tr>
                        <td><span >Рост</span></td>
                        <td>{{ $fighter->height }}</td>
                    </tr>
                    <tr>
                        <td><span >Город</span></td>
                        <td>{{ $fighter->city }}</td>
                    </tr>
                    <tr>
                        <td><span >Национальность</span></td>
                        <td>Россия</td>
                    </tr>
                    </tbody>
                </table>
        </div>
        <figure class="flex flex-col align-items-center md:w-1/3 mx-auto">
            <img class="fighter-about__image block"
                 src="@if($fighter->gallery_images){{ asset($fighter->gallery_images[0]) }}@else/images/boxing-{{ $num }}.jpg @endif"
                 width="360" height="414"
                 alt="Фото бойца" >
            <figcaption class="fighter-about__caption text-left">{{ $fighter->name }}</figcaption>
        </figure>

{{--        "/images/boxing-{{ $num }}.jpg"--}}

{{--        <figure class="flex flex-col align-items-center md:w-1/3 mx-auto">--}}
{{--            <img class="fighter-about__image block" src="{{ asset($fighter->avatar) }}" width="360" height="414" alt="" >--}}
{{--            <figcaption class="fighter-about__caption text-left">{{ $fighter->name }}</figcaption>--}}
{{--        </figure>--}}
{{--        @foreach($fighter->gallery_images as $image)--}}
{{--        <figure class="flex flex-col align-items-center md:w-1/3 mx-auto">--}}
{{--            <img class="fighter-about__image block" src="{{ asset($image) }}" width="360" height="414" alt="" >--}}
{{--            <figcaption class="fighter-about__caption text-left">{{ $fighter->name }}</figcaption>--}}
{{--        </figure>--}}
{{--        @endforeach--}}
    </div>
</section>
