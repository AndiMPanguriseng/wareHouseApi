<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Data Jadwal</h1>
    <table>
        <thead>
            <tr>
                <th>Mata Kuliah</th>
                <th>Kelas</th>
                <th>Dosen PJ</th>
                <th>Dosen Anggota 1</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ $row->mata_kuliah }}</td>
                <td>{{ $row->kelas }}</td>
                <td>{{ $row->dosen_pj }}</td>
                <td>{{ $row->dosen_anggota_1 }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
