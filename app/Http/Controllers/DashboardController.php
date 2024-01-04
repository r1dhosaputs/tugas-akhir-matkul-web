<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Petugas;

class DashboardController extends Controller
{
    //
    public function index(Buku $buku, Anggota $anggota, Petugas $petugas) {
        return view('dashboard.index',[
            'jumlah_buku' => $buku::count(),
            'jumlah_anggota' => $anggota::count(),
            'jumlah_petugas' => $petugas::count(),
            'title' => 'Dashboard',
        ]);
    }
}
