<!DOCTYPE html>
<html>
    <head>
        <title>Data Kategori barang</title>
    </head>
    <body>
        <h1>Data Kategori barang</h1>
        <table border="1" cell[adding="2" cellspacing="0"]>
            <tr>
                <th>ID</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{$d->kategori_id}}</td>
                <td>{{$d->kategori_kode}}</td>
                <td>{{$d->kategori_nama}}</td>
            </tr>
            @endforeach
        </table>
    </body>
</html>