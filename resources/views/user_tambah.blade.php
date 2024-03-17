<body>
    <h1>form tambah user</h1>
    <a href="{{ url('user') }}">Kembali</a>
    <form action="{{ url('user/tambah_simpan') }}" method="post">
        @csrf
       <label for="username">Username</label>
         <input type="text" name="username" id="username">
            <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
            <br>
        <br>

        <label for="password">Password</label>
        <input type="password" name="password" id="password">
            <br>
        <label for="level_id">Level ID</label>
        <input type="number" name="level_id" id="level_id">
            <br>
            <input type="submit" name="btn btn-success" value="Simpan">

    </form>
</body>