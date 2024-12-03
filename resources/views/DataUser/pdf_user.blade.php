<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF User</title>
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

    <h1>Data User</h1>

    <table id="customers">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No.Hp</th>
            <th>Alamat</th>
            <th>Role</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($db as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->no_telepon }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->role->nama }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
