<?php

namespace App\Http\Controllers;

use App\Keuangan;
use App\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        $total = Pengeluaran::sum('jumlah_uang');
        $pemasukan = Keuangan::sum('jumlah_bayar');

        $sisa = $pemasukan-$total;
        return view('admin.pengeluaran', ['pengeluaran' => $pengeluaran, 'total' => $total, 'sisa' => $sisa]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'jumlah_uang' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required'
        ]);
        Pengeluaran::create($request->all());
        return back()->with('sukses', 'Pengeluaran berhasil ditambahkan');
    }

    public function edit(Pengeluaran $id)
    {
        return view('admin.edit_pengeluaran', ['pengeluaran' => $id]);
    }

    public function delete(Pengeluaran $id)
    {
        $id->delete();
        return back()->with('sukses', 'Data Pengeluaran Berhasil dihapus');
    }

    public function update(Request $request, Pengeluaran $id)
    {

        $this->validate($request, [
            'jumlah_uang' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required'
        ]);

        $id->update([
            'jumlah_uang' => $request->jumlah_uang,
            'keperluan' => $request->keperluan,
            'tanggal' => $request->tanggal
        ]);

        $id->save();

        return redirect('/pengeluaran')->with('sukses', 'Data Pengeluaran berhasil di update');
    }
}
