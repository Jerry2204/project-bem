<?php

namespace App\Http\Controllers;

use App\Departemen;
use App\Kadep;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KadepController extends Controller
{
    public function index()
    {
        $kadep = Kadep::all();
        $departemen = Departemen::all();
        return view('admin.list_kadep', ['kepala_departemen' => $kadep, 'departemen' => $departemen]);
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required|unique:users',
            'alamat' => 'required',
            'no_hp' => 'required',
            'departemen_id' => 'unique:kadep'
        ]);

        // insert user
        $user = new User;
        $user->role = 'kadep';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('bem2020');
        $user->remember_token = Str::random(60);
        $user->save();

        //insert kadep
        $request->request->add(['user_id' => $user->id]);
        $kadep = Kadep::create($request->all());
        return back()->with('sukses', 'Kepala Departemen Berhasil ditambahkan');
    }

    public function proker(Departemen $id)
    {
        return view('kadep.proker', ['departemen' => $id]);
    }

    public function create_proker(Request $request, Departemen $id)
    {
        $this->validate($request, [
            'program_kerja' => 'required'
        ]);

        $id->update([
            'program_kerja' => $request->program_kerja
        ]);

        $id->save();
        return back()->with('sukses', 'Program Kerja Berhasil dibuat');
    }

    public function edit_proker(Departemen $id)
    {
        return view('kadep.edit_proker', ['departemen' => $id]);
    }

    public function update_proker(Request $request, $id)
    {
        $departemen = Departemen::find($id);
        $departemen->program_kerja = $request->program_kerja;
        $departemen->save();
        return back()->with('sukses', 'Program Kerja Berhasil diubah');
    }

    public function edit(Kadep $id)
    {
        $departemen = Departemen::all();
        return view('admin.edit_kadep', ['kadep' => $id, 'departemen' => $departemen]);
    }


    public function update(Request $request, Kadep $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'departemen_id' => 'required'
        ]);

        $user_id = $id->user->id;
        $user = User::find($user_id);
        $user->name = $request->nama;
        $user->save();

        $id->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'departemen_id' => $request->departemen_id
        ]);

        return redirect('/list_kadep')->with('sukses', 'Data Kepala Departemen Berhasil diubah');
    }

    public function delete(Kadep $id)
    {
        $id->user()->forceDelete();
        $id->delete();
        return back()->with('sukses', 'Data Kepala Departemen Berhasil dihapus');
    }
}
