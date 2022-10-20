<div id="timetable" class="class-timetable pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Расписание</span>
                    <h2 class="site-title text-white">Расписание боев</h2>
                    <div class="heading-divider"></div>
                    <p class="text-white">
                        Не пропусти турнир с любимым бойцом
                    </p>
                </div>
            </div>
        </div>
        <div class="class-timetable-wrapper">
            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-tab1" data-bs-toggle="pill" data-bs-target="#tab1"
                            type="button" role="tab" aria-controls="tab1" aria-selected="true">15 октября
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-tab2" data-bs-toggle="pill" data-bs-target="#tab2" type="button"
                            role="tab" aria-controls="tab2" aria-selected="false">30 октября
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-tab3" data-bs-toggle="pill" data-bs-target="#tab3" type="button"
                            role="tab" aria-controls="tab3" aria-selected="false" style="border-right: none">15 ноября
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">

                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="pills-tab1">
                    <div class="timetable-content table-responsive">
                        <table class="table table-dark table-striped align-middle">
                            <thead>
                            <tr>
                                <th scope="col">Боец 1</th>
                                <th scope="col">Боец 2</th>
                                <th scope="col">Лига</th>
                                <th scope="col">Время</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($games as $game)
                                <tr>
                                    <td>
                                        <div class="timetable-trainer">
                                            <div class="">
                                                @if($game->members[0]->avatar)
                                                    <img src="{{ asset($game->members[0]->avatar) }}" alt="Аватар бойца">
                                                @else
                                                    <i class="fa fa-user-alien"></i>
                                                    @endif
                                            </div>
                                            <a href="{{ route('guest.fighter', $game->member_one_id) }}">
                                                <h5 class="hover:text-themeOrange">{{$game->members[0]->name}}</h5>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="timetable-trainer">
                                            <img src="/images/s4.jpg" alt="">
                                            <a href="{{ route('guest.fighter', $game->member_two_id) }}">
                                                <h5 class="hover:text-themeOrange">{{$game->members[1]->name}}</h5>
                                            </a>
                                        </div>
                                    </td>
                                    <td>Кулачный бой</td>
                                    <td>{{$game->datetime->format('d.m.Y в H:i')}}</td>
                                    <td>
                                        <a href="{{ route('guest.game', $game) }}" class="theme-btn">Подробнее</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="pills-tab2">
                    <div class="timetable-content table-responsive">
                        <table class="table table-dark table-striped align-middle">
                            <thead>
                            <tr>
                                <th scope="col">Боец</th>
                                <th scope="col">Лига</th>
                                <th scope="col">Время</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s1.jpg" alt="">
                                        <h5>Иван Иванов</h5>
                                    </div>
                                </td>
                                <td>Кулачный бой</td>
                                <td>18:00 - 18:30</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s2.jpg" alt="">
                                        <h5>Иван Петров</h5>
                                    </div>
                                </td>
                                <td>Кулачный бой</td>
                                <td>18:30 - 19:00</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s3.jpg" alt="">
                                        <h5>Пётр Иванов</h5>
                                    </div>
                                </td>
                                <td>Кулачный бой</td>
                                <td>19:00 - 19:30</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s4.jpg" alt="">
                                        <h5>Сергей Петров</h5>
                                    </div>
                                </td>
                                <td>MMA</td>
                                <td>19.30 - 20:00</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s5.jpg" alt="">
                                        <h5>Пётр Сергеев</h5>
                                    </div>
                                </td>
                                <td>MMA</td>
                                <td>20:00 - 20.30</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s6.jpg" alt="">
                                        <h5>Иван Сергеев</h5>
                                    </div>
                                </td>
                                <td>MMA</td>
                                <td>20:30 - 21:00</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s7.jpg" alt="">
                                        <h5>Иван Кулаков</h5>
                                    </div>
                                </td>
                                <td>MMA</td>
                                <td>21:00 - 22:00</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-tab3">
                    <div class="timetable-content table-responsive">
                        <table class="table table-dark table-striped align-middle">
                            <thead>
                            <tr>
                                <th scope="col">Боец</th>
                                <th scope="col">Лига</th>
                                <th scope="col">Время</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s1.jpg" alt="">
                                        <h5>Иван Иванов</h5>
                                    </div>
                                </td>
                                <td>Кулачный бой</td>
                                <td>18:00 - 18:30</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s2.jpg" alt="">
                                        <h5>Иван Петров</h5>
                                    </div>
                                </td>
                                <td>Кулачный бой</td>
                                <td>18:30 - 19:00</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s3.jpg" alt="">
                                        <h5>Пётр Иванов</h5>
                                    </div>
                                </td>
                                <td>Кулачный бой</td>
                                <td>19:00 - 19:30</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s4.jpg" alt="">
                                        <h5>Сергей Петров</h5>
                                    </div>
                                </td>
                                <td>MMA</td>
                                <td>19.30 - 20:00</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s5.jpg" alt="">
                                        <h5>Пётр Сергеев</h5>
                                    </div>
                                </td>
                                <td>MMA</td>
                                <td>20:00 - 20.30</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s6.jpg" alt="">
                                        <h5>Иван Сергеев</h5>
                                    </div>
                                </td>
                                <td>MMA</td>
                                <td>20:30 - 21:00</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="timetable-trainer">
                                        <img src="/images/s7.jpg" alt="">
                                        <h5>Иван Кулаков</h5>
                                    </div>
                                </td>
                                <td>MMA</td>
                                <td>21:00 - 22:00</td>
                                <td>
                                    <a href="#" class="theme-btn">Подробнее</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
