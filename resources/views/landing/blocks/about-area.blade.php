<div class="about-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-left">
                    <div class="about-img">
                        <img src="/images/about.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-right">
                    <div class="site-heading mb-3">
                        <span class="site-title-tagline">Как это работает?</span>
                        <h2 class="site-title text-white">Первый в России <span>Интерактивный портал</span> бойцовского клуба
                        </h2>
                    </div>
                    <p class="about-text">Вступай в клуб поддержи бойцов и стань легендой. Одна победа, одна страна, один шаг до победы. После регистрации получишь полный доступ к материалам портала и сможешь поддержать легенду.</p>
                    <div class="about-list-wrapper">
                        <ul class="about-list list-unstyled">
                            <li>
                                <div class="icon"><i class="flaticon-people"></i></div>
                                <div class="text">
                                    <h4 class="text-white">Твоя поддержка нужна новичкам</h4>
                                    <p>Поддержи будущую легенду кулачных боёв</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><i class="flaticon-play-button"></i></div>
                                <div class="text">
                                    <h4 class="text-white">Запиши видео обращение</h4>
                                    <p>Напутствие перед боем или поздравление с победой</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    @guest
                        <a href="/register"
                           class="theme-btn"
                           data-bs-toggle="modal"
                           data-bs-target="#registerModal">
                            Зарегистрироваться
                            <i class="far fa-arrow-right"></i>
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
