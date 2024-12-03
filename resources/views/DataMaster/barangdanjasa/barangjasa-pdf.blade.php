<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Barang dan Jasa</title>
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

    <h1>Data Barang dan Jasa</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tipe</th>
            <th>Harga Jual</th>
            <th>Stok</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($db as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->tipe }}</td>
                <td>Rp.{{ number_format($data->harga_jual) }}</td>
                <td>{{ number_format($data->stok) }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
