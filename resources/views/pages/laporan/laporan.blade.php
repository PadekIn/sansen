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

    <div class="container w-full not-print mb-4">
        <form action="{{ url('main/laporan') }}" method="POST" class="d-flex gap-4">
            @csrf
            <label for="populasii" class="pt-1" style="white-space: nowrap; font-size: 0.875rem;">Populasi</label>
            <select name="populasii" id="populasii" class="form-control form-control-sm" style="font-size: 0.875rem;" required>
                <option>Pilih Populasi</option>
                @foreach($populasis as $populasi)
                    <option value="{{ $populasi->hashid }}" {{ old('populasi', $populasii ?? '') == $populasi->hashid ? 'selected' : '' }}>
                        {{ $populasi->jumlah }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="primary-default-btn">Filter</button>
            <button class="primary-white-btn" id="btn-print">Print</button>
        </form>

        {{-- <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-title"> --}}
                {{-- <a href="" class="btn btn-primary">Cetak</a> --}}

            {{-- </h5>
        </div> --}}
    </div>

    @if (isset($laporans))
    <div id="listTable" class="card mb-4">
    <section class="section p-4">
        <div class="card mb-4">
            <div class="card-body">
                    <table class="table datatable">
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
                            @foreach ( $laporans as $laporan )
                                @foreach ($laporan['actual'] as $actual)
                                    <tr>
                                        <td>Actual</td>
                                        <td>{{ $actual->fcr }}</td>
                                        <td>{{ $actual->fi }}</td>
                                        <td>{{ $actual->fe }}</td>
                                        <td>{{ $actual->dep }}</td>
                                        <td>{{ $actual->abw }}</td>
                                        <td>{{ $actual->adg }}</td>
                                        <td>{{ $actual->ip}}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                        <tbody>
                            @foreach ( $laporans as $laporan )
                            @foreach ($laporan['standar'] as $standar)
                                <tr>
                                    <td>Standar</td>
                                    <td>{{ $standar->fcr }}</td>
                                    <td>{{ $standar->fi }}</td>
                                    <td>{{ $standar->fe }}</td>
                                    <td>{{ $standar->dep }}</td>
                                    <td>{{ $standar->abw }}</td>
                                    <td>{{ $standar->adg }}</td>
                                    <td>{{ $standar->ip }}</td>
                                </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                        <tbody>
                            {{-- @foreach ($standars as $standar) --}}
                                <tr>
                                    @foreach ( $laporans as $laporan )
                                        @foreach ( $laporan['actual'] as $actual )
                                            @foreach ( $laporan['standar'] as $standar )
                                                <td>DIFFT</td>
                                                <td>{{ $actual->fcr - $standar->fcr }}</td>
                                                <td>{{ $actual->fi - $standar->fi }}</td>
                                                <td>{{ number_format($actual->fe - $standar->fe, 2) }}</td>
                                                <td>{{ $actual->dep - $standar->dep }}</td>
                                                <td>{{ $actual->abw - $standar->abw }}</td>
                                                <td>{{ $actual->adg - $standar->adg }}</td>
                                                <td>{{ $actual->ip - $standar->ip }}</td>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </tr>
                            {{-- @endforeach --}}

                        </tbody>
                        <tbody>
                            {{-- @foreach ($standars as $standar) --}}
                                <tr>
                                    @foreach ( $laporans as $laporan )
                                        @foreach ( $laporan['actual'] as $actual )
                                            @foreach ( $laporan['standar'] as $standar )
                                                <td>Persentase</td>
                                                <td>{{ number_format(($actual->fcr / $standar->fcr) * 100 , 2 )}}%</td>
                                                <td>{{ number_format(($actual->fi / $standar->fi) * 100 , 2)}}%</td>
                                                <td>{{ number_format(($actual->fe / $standar->fe) * 100, 1) }}%</td>
                                                <td>{{ number_format(($actual->dep / $standar->dep) * 100 , 2 ) }}%</td>
                                                <td>{{ number_format(($actual->abw / $standar->abw) * 100 , 2 ) }}%</td>
                                                <td>{{ number_format(($actual->adg / $standar->adg) * 100 , 2 ) }}%</td>
                                                <td>{{ number_format(($actual->ip / $standar->ip) * 100 , 2 )}}%</td>
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                </tr>
                            {{-- @endforeach --}}

                        </tbody>
                    </table>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col">
                            <table class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td>GRADE DOC</td>
                                        <td>BW DOC</td>
                                        <td>ASAL DOC</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ( $laporans as $laporan )
                                            @foreach ($laporan['populasi'] as $populasi)
                                                <td>{{ $populasi->grade_doc }}</td>
                                                <td>{{ $populasi->bw_doc}} </td>
                                                <td>{{ $populasi->asal_doc}}</td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td class="">UMUR</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ( $laporans as $laporan )
                                            @foreach ( $laporan['populasi'] as $populasi )
                                                <td>{{ $populasi->umur_akhir }}</td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td>POPULASI</td>
                                        @foreach ( $laporans as $laporan )
                                            @foreach ( $laporan['populasi'] as $populasi )
                                                <td>{{ $populasi->jumlah }}</td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold">TOTAL KG</td>
                                        @foreach ( $laporans as $laporan )
                                            @foreach ( $laporan['populasi'] as $populasi)
                                                @foreach ( $laporan['actual'] as $actual )
                                                    <td>{{ number_format(( $populasi->jumlah - $actual->dep) * $actual->abw , 0  )}}</td>
                                                @endforeach
                                            @endforeach
                                        @endforeach
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
                            <table class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td>PAKAN</td>
                                        @foreach ( $laporans as $laporan )
                                            @foreach ($laporan['pakan'] as $pakan)
                                                <td>{{ $pakan->jenis }}</td>
                                            @endforeach
                                        @endforeach
                                        <td>TOTAL KG</td>
                                        <td>ZAK</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>KG</td>
                                        @php
                                            $totalKg = 0;
                                        @endphp
                                        @foreach ( $laporans as $laporan )
                                            @foreach ($laporan['pakan'] as $pakan)
                                                <td>{{ $pakan->jumlah }}</td>
                                                @php
                                                    $totalKg += $pakan->jumlah;
                                                @endphp
                                            @endforeach
                                        @endforeach
                                    <td>{{ $totalKg }}</td>
                                    <td>{{ $totalKg / 50000 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <table class="table datatable">
                                <thead>
                                    <tr style="font-weight: bold">
                                        <td>CHECK IN</td>
                                        <td>CHECK OUT</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ( $laporans as $laporan )
                                            @foreach ( $laporan['populasi'] as $populasi )
                                                <td>{{ $populasi->check_in }}</td>
                                                <td>{{ $populasi->check_out }}</td>
                                            @endforeach
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
    @endif


    <script>
        function printReport() {
            var table = document.getElementById('listTable');

            // Simpan ID tabel saat ini
            var originalId = table.id;

            // Ganti ID tabel untuk tujuan print
            table.id = 'print-table';

            var printWindow = window.open('', '', 'height=800,width=1200');
            printWindow.document.write('<html><head><title>Print Performa</title>');
            printWindow.document.write('<style>');
            printWindow.document.write('@media print { body { font-family: Arial, sans-serif; }');
            printWindow.document.write('.header { text-align: center; margin-bottom: 20px; display: flex; align-items: center; justify-content: space-between; }');
            printWindow.document.write('.footer { text-align: center; margin-top: 20px; }');
            printWindow.document.write('.no-print { display: none; }');
            printWindow.document.write('table { width: 100%; border-collapse: collapse; margin: 20px 0; table-layout: fixed; }');
            printWindow.document.write('th, td { border: 1px solid #ddd; text-align: center; word-wrap: break-word; padding: 8px; }');
            printWindow.document.write('th { background-color: #f2f2f2; }');
            printWindow.document.write('@page { size: portrait; } }');
            printWindow.document.write('</style></head><body>');

            // Header
            printWindow.document.write('<div class="header">');
            printWindow.document.write('<img src="/assets/img/svg/japfaa.png" style="height: 50px;" alt="JAPFA Logo">');
            printWindow.document.write('<div style="text-align: center; flex-grow: 1;">');

            // Logo Sansen (Tambahkan margin bawah agar ada jarak ke teks di bawahnya)
            printWindow.document.write('<img src="/assets/img/svg/logo.PNG" style="height: 60px; margin-bottom: 20px;" alt="Sansen Logo">');

            // Teks Performa Periode (Tambahkan margin atas agar ada jarak dari logo)
            printWindow.document.write('<h2 style="margin: 20px 0 0 0;">PERFORMA <span style="background-color: #008080; color: white; padding: 5px 10px; border-radius: 5px;">PERIODE:</span></h2>');

            printWindow.document.write('</div>');
            printWindow.document.write('<div style="font-size: 15px; font-weight: bold; text-transform: uppercase; font-family: Arial, sans-serif; text-align: center; line-height: 1.2;">');
            printWindow.document.write('<div>SANSEN</div>'); // Rata tengah
            printWindow.document.write('<div>BROTHER FARM</div>'); // Rata tengah
            printWindow.document.write('</div>');
            printWindow.document.write('</div>');

            // Laporan
                        // printWindow.document.write('<hr>');

            // Tabel Laporan
            printWindow.document.write(document.querySelector('#print-table').outerHTML);

            // Footer
            // printWindow.document.write('<div style="text-align: right; margin-top: 4rem;">');
            // printWindow.document.write('<p style="margin-bottom:4rem; text-align: right;">Jambi, 23 September 2024</p>');
            // printWindow.document.write('<p style="margin-top:3rem;">Rahmiyati, S.Pd</p>');
            // printWindow.document.write('<p>Nip: 1976112003122003</p>');
            // printWindow.document.write('</div>');

            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            setTimeout(function() {
                printWindow.print();
            }, 900);
            printWindow.onafterprint = function() {
                // Kembalikan ID tabel ke semula
                table.id = originalId;
                printWindow.close();
            };
        }

        document.querySelector('#btn-print').addEventListener('click', function(event) {
            event.preventDefault();
            printReport();
        });
    </script>
</x-app-layout>
