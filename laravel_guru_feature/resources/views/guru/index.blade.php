<h2>Daftar Guru</h2>
<a href="{{ route('guru.create') }}">Tambah Guru</a>
<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>NIP</th>
        <th>Mapel</th>
        <th>No HP</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    @foreach($guru as $g)
    <tr>
        <td>{{ $g->nama }}</td>
        <td>{{ $g->nip }}</td>
        <td>{{ $g->mapel }}</td>
        <td>{{ $g->nomor_hp }}</td>
        <td>{{ $g->alamat }}</td>
        <td>
            <a href="{{ route('guru.edit', $g->id) }}">Edit</a>
            <form action="{{ route('guru.destroy', $g->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Hapus?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
