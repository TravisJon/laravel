<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Data Servis</title>
    <style>
        <style>#customers {
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

    <h1>Data Servis Pelanggan - Status: {{ implode(', ', $status) }}</h1>

    <table id="customers">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Kasir</th>
                <th>Teknisi</th>
                <th>Barang</th>
                <th>No.Hp</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($db as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</td>
                    <td>{{ $data->datapelanggan->nama }}</td>
                    <td>{{ $data->kasir }}</td>
                    <td>{{ $data->user->nama }}</td>
                    <td>{{ $data->jenisbarang->nama }}</td>
                    <td>{{ $data->datapelanggan->no_telepon }}</td>
                    <td>{{ $data->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
