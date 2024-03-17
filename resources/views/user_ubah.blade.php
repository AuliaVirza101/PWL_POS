<body>
    <h1>Form Ubah User</h1>
    <a href="{{ url('user') }}">Kembali</a>
    <form action="{{ route('user.ubah_simpan', $data->user_id) }}" method="post">
        @csrf
        <label for="username">Username</label>
        <input type="text" name="username" id="username" value="{{ $data->username }}" >
        <input type="hidden" name="user_id" id="user_id" value="{{ $data->user_id }}" >
        <br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ $data->nama }}" >
        <br>
        <br>
        <label for="level_id">Level ID</label>
        <input type="number" name="level_id" id="level_id" value="{{ $data->level_id }}">
        <br>
        <input type="submit" class="btn btn-success" value="Simpan">
    </form>
</body>