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
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title">
                        <a href="{{ route('main.standar.create') }}" class="btn btn-primary">Tambah Standar Performa
                            Baru
                        </a>
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
    </section>
</x-app-layout>
