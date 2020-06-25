<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $admin = User::where('role', 'admin')->get();
        return view('admin.admin', compact('admin'));
    }

    public function account_setting(User $id)
    {
        return view('admin.account_setting', ['user' => $id]);
    }

    public function account_update(Request $request, $id)
    {
        $user = User::find($id);
        $password = $user->password;
        $user->update(['email' => $request->email]);
        if($request->password == ""){
            $user->password = $password;
        }
        else{
            $user->update(['password' => bcrypt($request->password)]);
        }

        $user->save();
        return back()->with('sukses', 'Data Berhasil diubah');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User;
        $user->role = 'admin';
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        return back()->with('sukses', 'Admin Berhasil ditambahkan');
    }

    public function edit(User $id)
    {
        return view('admin.edit_admin', ['admin' => $id]);
    }

    public function update(Request $request, User $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $id->update([
            'name' => $request->name
        ]);

        $id->save();

        return redirect('/admin')->with('sukses', 'Data Admin Berhasil diupdate');
    }

    public function delete(User $id)
    {
        $id->delete();

        return back()->with('sukses', 'Data Admin berhasil dihapus');
    }
}
