<h2>Tambah Data Guru</h2>
<form action="{{ route('guru.store') }}" method="POST">
    @csrf
    <label>Nama:</label><br>
    <input type="text" name="nama"><br>
    <label>NIP:</label><br>
    <input type="text" name="nip"><br>
    <label>Mapel:</label><br>
    <input type="text" name="mapel"><br>
    <label>No HP:</label><br>
    <input type="text" name="nomor_hp"><br>
    <label>Alamat:</label><br>
    <textarea name="alamat"></textarea><br>
    <button type="submit">Simpan</button>
</form>
