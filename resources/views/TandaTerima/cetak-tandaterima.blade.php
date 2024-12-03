<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Tanda Terima Servis</title>
    <style>
        /* Set ukuran kertas A4 */
        @page {
            size: A4;
            margin: 10mm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            font-size: 14px;
            /* Perbesar ukuran font */
        }

        .container {
            width: 100%;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            /* Perbesar margin bawah header */
        }

        .header h2 {
            margin: 0;
            font-size: 18px;
        }

        .table {
            width: 100%;
            margin-bottom: 10px;
            /* Perbesar jarak antar tabel */
            border-collapse: collapse;
            color: #212529;
            font-size: 14px;
            /* Perbesar ukuran font dalam tabel */
        }

        .table th,
        .table td {
            padding: 8px;
            /* Perbesar padding dalam sel */
            vertical-align: top;
            border: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .text-center {
            text-align: center;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .mt-2 {
            margin-top: 20px;
            /* Perbesar margin atas */
        }

        .mt-4 {
            margin-top: 30px;
            /* Perbesar margin atas */
        }

        .contact-info {
            text-align: center;
            margin-bottom: 20px;
            /* Perbesar margin bawah contact-info */
        }

        .contact-info div {
            margin: 5px 0;
            /* Perbesar margin antar baris info kontak */
        }

        .footer-notes {
            font-size: 12px;
            /* Perbesar ukuran font untuk ketentuan */
            margin-top: 30px;
            /* Perbesar jarak antar tabel dan footer */
            border-top: 1px solid #dee2e6;
            padding-top: 10px;
            /* Perbesar padding atas */
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 5px;
            /* Perbesar jarak antar list item */
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div class="header">
            <h2>The Computer Store (TCS) Servis</h2>
        </div>
        <div class="contact-info">
            <div>JL.Tuanku Tambusai No. 12B, Kecamatan Payung Sekaki, Kota Pekanbaru, Riau 28292.</div>
            <div>No.Telepon: 081319248598</div>
            <div>Email: tcsservis@gmail.com</div>
        </div>
        <table class="table table-bordered mt-2">
            <tr>
                <th class="text-center">
                    <h3>TANDA TERIMA SERVIS</h3>
                </th>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td>
                    <h4>Pelanggan: {{ $dataServis->datapelanggan->nama }}</h4>
                    <p>Alamat: {{ $dataServis->datapelanggan->alamat }}</p>
                    <p>No.Hp: {{ $dataServis->datapelanggan->no_telepon }}</p>
                    <p>Email: {{ $dataServis->datapelanggan->email }}</p>
                </td>
                <td>
                    <h4>No.Servis: {{ $dataServis->id }}</h4>
                    <p>Kasir: {{ $dataServis->kasir }}</p>
                    <p>Teknisi Perbaikan: {{ $dataServis->user->nama }}</p>
                    <p>Tgl Terima:
                        {{ \Carbon\Carbon::parse($dataServis->datapelanggan->created_at)->format('d-m-Y - H:i') }}
                    </p>
                </td>
            </tr>
        </table>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Barang</th>
                    <th>Tipe</th>
                    <th>Serial Number</th>
                    <th>Kelengkapan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1.</td>
                    <td>{{ $dataServis->jenisbarang->nama }}</td>
                    <td>{{ $dataServis->tipe }}</td>
                    <td>{{ $dataServis->serial_number }}</td>
                    <td>{{ $dataServis->kelengkapan }}</td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tr>
                <td colspan="6"><strong>Kerusakan:</strong> {{ $dataServis->kerusakan }}</td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                @if ($dataServis->status == 'Batal')
                    <td colspan="6"><strong>Alasan Pembatalan:</strong> {{ $dataServis->alasan_pembatalan }}</td>
                @else
                    <td colspan="6"><strong>Catatan:</strong> {{ $dataServis->catatan }}</td>
                @endif
            </tr>
        </table>
        <table class="table table-bordered text-center">
            <tr>
                <td>
                    <h4>Kasir Penerima,</h4>
                    <br><br>
                    <p>{{ $dataServis->kasir }}</p>
                </td>
                {{-- <td>
                    <h4>Teknisi,</h4>
                    <br><br>
                    <p>{{ $dataServis->user->nama }}</p>
                </td> --}}
                <td>
                    <h4>Pelanggan,</h4>
                    <br><br>
                    <p>{{ $dataServis->datapelanggan->nama }}</p>
                </td>
            </tr>
        </table>

        <!-- Keterangan dan Kebijakan -->
        <div class="footer-notes">
            <p><strong>Ketentuan & Kebijakan:</strong></p>
            <ul>
                <li>Barang yang telah diterima untuk servis tidak dapat dibatalkan atau dikembalikan tanpa persetujuan
                    tertulis dari pihak kami.</li>
                <li>Setelah barang diservis, pelanggan diberi waktu 30 hari untuk mengambil barang. Setelah itu, kami
                    tidak bertanggung jawab atas kehilangan atau kerusakan.</li>
                <li>Barang yang tidak diambil dalam jangka waktu lebih dari 60 hari setelah perbaikan selesai, dianggap
                    tidak diinginkan dan akan diproses lebih lanjut.</li>
            </ul>
        </div>
    </div>
</body>

</html>
