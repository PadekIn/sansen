<x-app-layout>
    <h1>laporan</h1>
    <table id="listTable" class="table datatable">
        <thead>
            <tr style="font-weight: bold">
                <td>PERF</td>
                <td>FCR</td>
                <td>FI</td>
                <td>FE</td>
                <td>DEP</td>
                <td>ABW</td>
                <td>ADG</td>
                <td>IP</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($standars as $standar)
                <tr>
                    <td>Actual</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
        <tbody>
            @foreach ($standars as $standar)
                <tr>
                    <td>Standar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
        <tbody>
            @foreach ($standars as $standar)
                <tr>
                    <td>DIFFT</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
        <tbody>
            @foreach ($standars as $standar)
                <tr>
                    <td>Persentase</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-app-layout>
