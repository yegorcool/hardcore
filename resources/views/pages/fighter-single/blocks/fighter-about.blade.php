<section class="fighter-about bg-black min-h-[80vh] max-w-7xl mx-auto">
    <div class="fighter-about__wrapper relative px-4 lg:p-8 mb-8 md:flex justify-between align-items-center">
        <div class="fighter-about__text-block md:w-1/2 pb-10 text-gray-50 z-10">
            <h2 class="fighter-about__title text-white  -mt-10 mb-10">
                Биография
            </h2>
            <div class="fighter-about__text text-gray-50">
                <p class="text-gray-50">
                    Единых правил для всех версий абсолютных поединков не существует и никогда не существовало. По сути, они сводились к одному основополагающему принципу: минимум защитной экипировки и ограничений на используемую технику, максимум «реализма» поединков и свободы действий бойцов. Запрещались только те «приемы», которые прямо вели к тяжелым увечьям: нельзя было выдавливать глаза и ломать позвоночник сопернику, наносить ему удары в горло, пах и другие уязвимые места. </p>
                <p>
                    (Не разрешалось также надевать предметы, которые могли привести к травме: серьги, браслеты, цепи, булавки и т.п.) Весовые категории не предусматривались. Не ограничивалось время поединка: бой шел до полной сдачи одного из соперников. Костюм бойцы выбирали произвольно, это могли быть боксерские трусы, кимоно дзюдоиста и т.д. Защитная экипировка тоже выбиралась спортсменами индивидуально: например, можно было, по желанию, выступать в перчатках (сегодня специальные облегченные перчатки «без пальцев» в боях без правил обязательны).
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
            <img class="fighter-about__image block" src="/images/boxing-{{ $num }}.jpg" width="360" height="414" alt="" >
            <figcaption class="fighter-about__caption text-left">{{ $fighter->name }}</figcaption>
        </figure>
    </div>
</section>
