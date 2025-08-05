<h2>Edit Data Guru</h2>
<form action="{{ route('guru.update', $guru->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ $guru->nama }}"><br>
    <label>NIP:</label><br>
    <input type="text" name="nip" value="{{ $guru->nip }}"><br>
    <label>Mapel:</label><br>
    <input type="text" name="mapel" value="{{ $guru->mapel }}"><br>
    <label>No HP:</label><br>
    <input type="text" name="nomor_hp" value="{{ $guru->nomor_hp }}"><br>
    <label>Alamat:</label><br>
    <textarea name="alamat">{{ $guru->alamat }}</textarea><br>
    <button type="submit">Update</button>
</form>
