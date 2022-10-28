@if($fighter->gallery_images)
    <div class="service-area pb-120 mt-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline">Галлерея</span>
                        <h2 class="site-title text-white">Знаменательные моменты</h2>
                        <div class="heading-divider"></div>
                        <p class="text-white">
                            Онлайн-портал для интерактивного общения
                        </p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap ">
                @forelse($fighter->gallery_images as $image)
                    <div class="ml-3 mb-3 ">
                        <img class="block h-[400px] w-auto" src="{{ asset($image) }}" alt="">
                    </div>
                @empty
                    <p>В галлерее нет фотографий...</p>
                @endforelse
            </div>
        </div>
    </div>
@endif
