<?php
namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('guru.index', compact('guru'));
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:guru',
            'mapel' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
        ]);

        Guru::create($request->all());
        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:guru,nip,' . $guru->id,
            'mapel' => 'required',
            'nomor_hp' => 'required',
            'alamat' => 'required',
        ]);
        $guru->update($request->all());
        return redirect()->route('guru.index')->with('success', 'Guru berhasil diupdate');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus');
    }
}
