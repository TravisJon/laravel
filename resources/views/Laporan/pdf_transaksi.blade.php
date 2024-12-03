<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Transaksi</title>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<body>

    <h1>Laporan Transaksi</h1>
    <p>Periode: {{ \Carbon\Carbon::parse($dari)->format('d-m-Y') }} sampai
        {{ \Carbon\Carbon::parse($sampai)->format('d-m-Y') }}</p>

    <table id="customers">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Barang/Jasa</th>
                <th>Harga Jual</th>
                <th>QTY</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $item->barangJasa->nama }}</td>
                    <td>Rp. {{ number_format($item->barangJasa->harga_jual) }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>Rp. {{ number_format($item->barangJasa->harga_jual * $item->qty) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="5">Total Pendapatan</th>
                <th>Rp. {{ number_format($total) }}</th>
            </tr>
        </tfoot>
    </table>

</body>

</html>
