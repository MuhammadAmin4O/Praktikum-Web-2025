@php
    header('Content-type: application/vnd-ms-excel');
    header('Content-Disposition: attachment; filename=export_product.xls');
@endphp
<!DOCTYPE html>
<html>

<head>
    <title>Export Product</title>
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
    <p>Kumpulan Produk </p>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
        @foreach ($product as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{ asset('/storage/products/' . $product->image) }}" class="rounded" style="width: 150px">
                </td>
                <td>{{ $product->image }}</td>
                <td>{{ $product->tittle }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
