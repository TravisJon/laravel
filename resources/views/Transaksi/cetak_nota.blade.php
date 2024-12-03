<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Nota Transaksi</title>
    <style>
        @page {
            size: A4;
            margin: 15mm;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 14px;
            /* Ukuran font lebih besar */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th,
        td {
            padding: 10px;
            /* Padding yang lebih besar */
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-size: 14px;
            /* Ukuran font header tabel lebih besar */
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .mt-2 {
            margin-top: 20px;
        }

        .mt-4 {
            margin-top: 30px;
        }

        .signature-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 30px;
        }

        .signature-container p {
            margin: 0;
            font-size: 14px;
            /* Ukuran font tanda tangan */
        }

        .footer-notes {
            font-size: 12px;
            /* Ukuran font catatan kaki lebih besar */
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }

        li {
            margin-bottom: 6px;
        }
    </style>
</head>

<body onload="window.print()">

    <!-- Header Toko -->
    <table>
        <tr>
            <th class="text-center">
                <h2>The Computer Store (TCS)</h2>
            </th>
        </tr>
    </table>
    <div class="contact-info text-center">
        <div>JL.Tuanku Tambusai No. 12B, Kecamatan Payung Sekaki, Kota Pekanbaru, Riau 28292.</div>
        <div>No.Telepon: 081319248598</div>
        <div>Email: tcsservis@gmail.com</div>
    </div>

    <!-- Nota Transaksi -->
    <table class="mt-2">
        <tr>
            <th class="text-center">
                <h3><strong>NOTA TRANSAKSI</strong></h3>
            </th>
        </tr>
    </table>

    <!-- Detail Transaksi -->
    <table>
        <tr>
            <th>No. Servis</th>
            <td>{{ $dataservisID->id }}</td>
        </tr>
        <tr>
            <th>Tgl. Terima</th>
            <td>{{ \Carbon\Carbon::parse($dataservisID->datapelanggan->created_at)->format('d-m-Y - H:i') }}</td>
        </tr>
        <tr>
            <th>Tgl. Diambil</th>
            <td>{{ \Carbon\Carbon::parse($dataservisID->updated_at)->format('d-m-Y - H:i') }}
            </td>
        </tr>
        <tr>
            <th>Pelanggan</th>
            <td>{{ $dataservisID->datapelanggan->nama }}</td>
        </tr>
        <tr>
            <th>Jenis Barang</th>
            <td>{{ $dataservisID->jenisbarang->nama }}</td>
        </tr>
        <tr>
            <th>Kerusakan</th>
            <td>{{ $dataservisID->kerusakan }}</td>
        </tr>
        <tr>
            <th>Status Servis</th>
            <td>{{ $dataservisID->status }}</td>
        </tr>
        <tr>
            <th>Kasir</th>
            <td>{{ $dataservisID->kasir }}</td>
        </tr>
    </table>

    <!-- Rincian Biaya -->
    <table class="mt-2">
        <thead>
            <tr>
                <th>No</th>
                <th>Barang/Jasa</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->barangJasa->nama }}</td>
                    <td>Rp. {{ number_format($item->barangJasa->harga_jual) }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp. {{ number_format($item->barangJasa->harga_jual * $item->qty) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-right">Total Biaya</th>
                <th>Rp. {{ number_format($total) }}</th>
            </tr>
        </tfoot>
    </table>

    <!-- Keterangan dan Kebijakan -->
    <div class="footer-notes">
        <p><strong>Ketentuan & Kebijakan:</strong></p>
        <ul>
            <li>Barang yang sudah dibeli tidak dapat dikembalikan atau ditukar dengan barang lain, kecuali terdapat
                kesalahan dari pihak kami.</li>
            <li>Servis memiliki garansi selama 30 hari terhitung sejak tanggal pengambilan barang, hanya berlaku untuk
                kerusakan yang sama.</li>
            <li>Garansi tidak berlaku jika kerusakan disebabkan oleh kesalahan penggunaan, kecelakaan, atau modifikasi
                tanpa persetujuan teknisi kami.</li>
        </ul>
    </div>

    <!-- Cap dan Tanda Tangan -->
    <div class="signature-container">
        <div class="text-right">
            <p><strong>Hormat Kami,</strong></p>
            <p style="margin-top: 50px;"><strong>The Computer Store</strong></p>
        </div>
    </div>

</body>

</html>
