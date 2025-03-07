<x-app-layout>
    <div class="pagetitle px-4">
        <h1> Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section p-4">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <a href="" class="btn btn-primary">Cetak</a>
                    </h5>
                </div>
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
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">
                            <table id="listTable" class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td>GRADE DOC</td>
                                        <td>BW DOC</td>
                                        <td>ASAL DOC</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table id="listTable" class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td class="">UMUR</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table id="listTable" class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td>POPULASI</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold">TOTAL KG</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row align-items-start">

                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">
                            <table id="listTable" class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td>PAKAN</td>
                                        <td>SB 10</td>
                                        <td>SB 11</td>
                                        <td>TOTAL KG</td>
                                        <td>ZAK</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>KG</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table id="listTable" class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td>CHECK IN</td>
                                        <td>CHECK OUT</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
