<div class="my-4 overflow-x-auto">
    <table
        class="table table-responsive table-dark table-sm table-hover bg-black align-middle text-gray-200 min-w-[900px] ">
        <thead class="table-group-divider border-top-color-themeRed">
        <tr class="uppercase text-themeRed font-semibold">
            <th scope="col">Id</th>
            <th scope="col">Начало</th>
            <th scope="col">Окончание</th>
            <th scope="col" class="min-w-20">Заголовок</th>
            <th scope="col">Описание</th>
            <th scope="col">Изменить</th>
            <th scope="col">Удалить</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @forelse($careerEvents as $event )
            <tr>
                <th scope="row">{{$event->id}}</th>
                <td>{{$event->date_start->format('d.m.Y')}}</td>
                <td>@if($event->date_end){{$event->date_end->format('d.m.Y')}}@else @endif</td>
                <td class="min-w-20">{{$event->title}}</td>
                {{--                            <td><a href="{{ route('producer.fighters.show', $fighter) }}" class="hover:text-themeOrange">{{$fighter->email}}</a></td>--}}
                <td class="min-w-[300px] max-w-[500px]">{{$event->description}}</td>
                <td><a href="{{ route('producer.career_events.edit', $event) }}"
                       class="theme-btn bg-white/50 mx-2 text-sm">Редактировать</a></td>
                <td>
                    <form action="{{ route('producer.career_events.destroy', $event) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="theme-btn mx-2 text-sm bg-themeRed">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <p class="text-gray-500 text-xl mb-2 pl-3">Ни одного этапа еще не добавлено...</p>
        @endforelse
        </tbody>
        <tfoot class="bg-white/10"></tfoot>
    </table>
</div>
