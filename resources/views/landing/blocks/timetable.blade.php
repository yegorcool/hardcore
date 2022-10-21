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
                            type="button" role="tab" aria-controls="tab1" aria-selected="true">23 октября
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
                            @foreach($games->where('datetime', '=', '2022-10-23 20:00:00') as $game)
                                <tr>
                                    <td>
                                        <div class="timetable-trainer">
                                            <div class="w-[45px] h-[45px] overflow-hidden  flex justify-center items-center">
                                                @if($game->members[0]->avatar)
                                                    <img class="w-full h-full rounded-3xl" src="{{ asset($game->members[0]->avatar) }}" alt="Аватар">
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
                                            <div class="w-[45px] h-[45px] overflow-hidden flex justify-center items-center">
                                                @if($game->members[1]->avatar)
                                                    <img class="w-full h-full rounded-3xl" src="{{ asset($game->members[1]->avatar) }}" alt="Аватар">
                                                @else
                                                    <i class="fa fa-user-alien"></i>
                                                @endif
                                            </div>
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
                                <th scope="col">Боец 1</th>
                                <th scope="col">Боец 2</th>
                                <th scope="col">Лига</th>
                                <th scope="col">Время</th>
                                <th scope="col">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($games->where('datetime', '=', '2022-10-30 20:00:00') as $game)
                                <tr>
                                    <td>
                                        <div class="timetable-trainer">
                                            <div class="w-[45px] h-[45px] overflow-hidden  flex justify-center items-center">
                                                @if($game->members[0]->avatar)
                                                    <img class="w-full h-full rounded-3xl" src="{{ asset($game->members[0]->avatar) }}" alt="Аватар">
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
                                            <div class="w-[45px] h-[45px] overflow-hidden flex justify-center items-center">
                                                @if($game->members[1]->avatar)
                                                    <img class="w-full h-full rounded-3xl" src="{{ asset($game->members[1]->avatar) }}" alt="Аватар">
                                                @else
                                                    <i class="fa fa-user-alien"></i>
                                                @endif
                                            </div>
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

                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="pills-tab3">
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
                            @foreach($games->where('datetime', '=', '2022-11-15 20:00:00') as $game)
                                <tr>
                                    <td>
                                        <div class="timetable-trainer">
                                            <div class="w-[45px] h-[45px] overflow-hidden  flex justify-center items-center">
                                                @if($game->members[0]->avatar)
                                                    <img class="w-full h-full rounded-3xl" src="{{ asset($game->members[0]->avatar) }}" alt="Аватар">
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
                                            <div class="w-[45px] h-[45px] overflow-hidden flex justify-center items-center">
                                                @if($game->members[1]->avatar)
                                                    <img class="w-full h-full rounded-3xl" src="{{ asset($game->members[1]->avatar) }}" alt="Аватар">
                                                @else
                                                    <i class="fa fa-user-alien"></i>
                                                @endif
                                            </div>
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

            </div>
        </div>
    </div>
</div>
