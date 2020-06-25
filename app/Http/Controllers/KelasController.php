<?php

namespace App\Http\Controllers;

use App\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_kelas' => 'required',
            'jumlah_mahasiswa' => 'required'
        ]);

        Kelas::create($request->all());
        return back()->with('sukses', 'Kelas Berhasil ditambahkan');
    }

    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas', ['kelas' => $kelas]);
    }

    public function edit(Kelas $id)
    {
        return view('admin.edit_kelas', ['kelas' => $id]);
    }

    public function update(Request $request, Kelas $id)
    {
        $this->validate($request, [
            'nama_kelas' => 'required',
            'jumlah_mahasiswa' => 'required'
        ]);

        $id->update([
            'nama_kelas' => $request->nama_kelas,
            'jumlah_mahasiswa' => $request->jumlah_mahasiswa
        ]);
        $id->save();

        return redirect('/kelas')->with('sukses', 'Kelas Berhasil diubah');
    }

    public function delete(Kelas $id)
    {
        $id->keuangan()->forceDelete();
        $id->delete();
        return back()->with('sukses', 'Kelas Berhasil dihapus');
    }
}
