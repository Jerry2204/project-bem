<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Keuangan;
use Illuminate\Http\Request;

class KeuanganController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        $keuangan = Keuangan::orderBy('id', 'desc')->get();
        $total_uang = Keuangan::sum('jumlah_bayar');
        return view('admin.keuangan', ['keuangan' => $keuangan, 'kelas' => $kelas, 'total' => $total_uang]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'jumlah_bayar' => 'required',
            'tanggal_bayar' => 'required',
            'kelas_id' => 'required'
        ]);
        Keuangan::create($request->all());
        return back()->with('sukses', 'Keuangan berhasil ditambahkan');
    }

    public function edit(Keuangan $id)
    {
        $kelas = Kelas::all();
        return view('admin.edit_keuangan', ['keuangan' => $id, 'kelas' => $kelas]);
    }

    public function update(Request $request,Keuangan $id)
    {
        $this->validate($request, [
            'jumlah_bayar' => 'required',
            'tanggal_bayar' => 'required',
            'kelas_id' => 'required'
        ]);

        $id->update([
            'jumlah_bayar' => $request->jumlah_bayar,
            'tanggal_bayar' => $request->tanggal_bayar,
            'kelas_id' => $request->kelas_id
        ]);
        $id->save();

        return redirect('/keuangan')->with('sukses', 'Data Keuangan berhasil diubah');
    }

    public function delete(Keuangan $id)
    {
        $id->delete();
        return back()->with('sukses', 'Data Berhasil Dihapus');
    }
}
