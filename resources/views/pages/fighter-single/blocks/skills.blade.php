<section class="container-fluid  bg-gray-100 px-lg-5 mx-auto sm:px-6 lg:px-8">
    <div class="text-2xl w-1/2 min-h-[500px] flex justify-center items-center mx-auto relative">
        <div class="skill relative">
            <div class="skill__outer">
                <div class="skill__inner flex justify-center items-center ">
                    <div class="flex flex-col justify-center items-center">
                        <div class="skill__title text-center skill-percent"></div>
                        <div class="skill__title text-center">Знание</div>
                    </div>

                </div>
            </div>
            <svg class="skill__shape" viewBox="0 0 160 160" width="160" height="160"
                 preserveAspectRatio="none">
                <defs>
                    <linearGradient id="skill__gradient" x1="0" y1="50%" x2="100%" y2="50%">
                        <stop offset="30%" stop-color="#5500f2"></stop>
                        <stop offset="100%" stop-color="#ad00ed"></stop>
                    </linearGradient>
                </defs>
                {{--<circle class="skill__circle skill__circle--down" r="68" cx="80" cy="80"></circle>--}}
                <circle class="skill__circle skill__circle--up" r="70" cx="80" cy="80"
                        transform="rotate(270 80 80)"
                        stroke-linecap="round"></circle>
            </svg>
        </div>
    </div>
</section>
