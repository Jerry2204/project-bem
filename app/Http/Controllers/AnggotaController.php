<?php

namespace App\Http\Controllers;

use App\Anggota;
use App\Departemen;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index($id)
    {
        $departemen = Departemen::find($id);
        $anggota = Anggota::where('departemen_id', $id)->get();
        return view('kadep.anggota', ['departemen' => $departemen, 'anggota' => $anggota]);
    }

    public function create(Request $request, $id)
    {

        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'no_hp' => 'required'
        ]);

        $anggota = new Anggota;

        $anggota->nama = $request->nama;
        $anggota->nim = $request->nim;
        $anggota->prodi = $request->prodi;
        $anggota->no_hp = $request->no_hp;
        $anggota->departemen_id = $id;
        $anggota->save();

        return back()->with('sukses', 'Anggota Berhasil ditambahkan');
    }

    public function edit(Anggota $id)
    {
        return view('kadep.edit_anggota', ['anggota' => $id]);
    }

    public function update(Request $request, Anggota $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'no_hp' => 'required'
        ]);

        $id->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'no_hp' => $request->no_hp,
        ]);
        $id->save();

        return back()->with('sukses', 'Data Anggota Berhasil diubah');
    }
}
