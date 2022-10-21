<div id="team-area" class="team-area pt-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Лига</span>
                    <h2 class="site-title text-white">Наши легенды</h2>
                    <div class="heading-divider"></div>
                    <p class="text-white">
                        Лучшие бойцы клуба
                    </p>
                </div>
            </div>
        </div>
        <div class="block md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 grid-flow-row-dense">
            @foreach($bestFighters as $fighter)
            <div class="">
{{--            <div class="col-md-6 col-lg-4">--}}
                <div class="team-item">
                    {{--<img src="/images/02.jpg" alt="thumb">--}}
                    <img src="{{ asset($fighter->gallery_images[0]) }}" alt="thumb">
                    <div class="team-social">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        {{--<h6>Follow</h6>--}}
                    </div>
                    <div class="team-content">
                        <div class="team-bio">
                            <h5><a href="{{ asset( route('guest.fighter', $fighter)) }}">{{ $fighter->name }}</a></h5>
                            <span>Кулачный бой</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
