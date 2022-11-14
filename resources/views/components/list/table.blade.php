<table class="table table-responsive table-dark table-sm table-hover bg-black align-middle text-gray-200 min-w-[900px] ">

    <thead class="table-group-divider border-top border-top-color-themeRed">
        <tr class="uppercase text-themeRed font-semibold">
            {{ $th_content }}
        </tr>
    </thead>

    <tbody class="table-group-divider">
        {{ $slot }}
    </tbody>

    @isset($tfoot)
        <tfoot class="bg-white/10">
        {{ $tfoot }}
        </tfoot>
    @endisset

</table>
