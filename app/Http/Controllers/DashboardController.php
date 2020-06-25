<?php

namespace App\Http\Controllers;

use App\Departemen;
use App\Kadep;
use App\Kelas;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlah_departemen = Departemen::count();
        $jumlah_kadep = Kadep::count();
        $jumlah_kelas = Kelas::count();
        $jumlah_admin = User::where('role', 'admin')->count();
        return view('index', compact('jumlah_departemen', 'jumlah_kadep', 'jumlah_kelas', 'jumlah_admin'));
    }


}
