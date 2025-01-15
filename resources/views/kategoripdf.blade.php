<!DOCTYPE html>
<html>

<head>
    <title>Cetak Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap
.min.css">
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;

            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Kumpulan Kategori </p>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
        @foreach ($kategori as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->name }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
