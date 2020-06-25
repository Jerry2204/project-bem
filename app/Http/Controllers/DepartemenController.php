<?php

namespace App\Http\Controllers;

use App\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = Departemen::all();
        return view('admin.index', ['departemen' => $departemen]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'nama_departemen' => 'required'
        ]);

        Departemen::create($request->all());

        return back()->with('sukses', 'Departemen Berhasil ditambahkan!');
    }

    public function edit(Departemen $id)
    {
        return view('admin.edit_departemen', ['departemen'=> $id ]);
    }

    public function update(Request $request, Departemen $id)
    {
        $this->validate($request, [
            'nama_departemen' => 'required'
        ]);

        $id->update([
            'nama_departemen' => $request->nama_departemen
        ]);
        $id->save();

        return redirect('/list_departemen')->with('sukses', 'Data departemen berhasil diubah');
    }

    public function delete(Departemen $id)
    {
        $id->delete();
        $id->kadep()->forceDelete();
        $id->anggota()->forceDelete();
        return back()->with('sukses', 'Departemen Berhasil dihapus');
    }

}
