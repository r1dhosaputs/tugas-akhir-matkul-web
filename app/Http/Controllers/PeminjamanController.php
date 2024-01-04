<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peminjam = DB::table('peminjaman')
            ->select('peminjaman.*', 'buku.*', 'anggota.*', 'peminjaman.id as idpinjam')
            ->leftJoin('buku', 'peminjaman.kode_buku', '=', 'buku.kode_buku')
            ->leftJoin('anggota', 'peminjaman.kode_anggota', '=', 'anggota.kode_anggota')
            ->get();

        // return $peminjam;
        return view('peminjaman.index', [
            'title' => 'Peminjaman',
            'peminjam' => $peminjam,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $buku = 
        // $anggota = 
        return view('peminjaman.tambah', [
            'title' => 'Peminjaman',
            'buku' => DB::table('buku')->get(),
            'anggota' => DB::table('anggota')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $findKodePinjam = Peminjaman::where('kode_pinjam', $request->kode_pinjam)->first();
        // jika variabel findKodePinjam terisi maka
        if ($findKodePinjam) {
            return redirect()->route('peminjaman.create')->with(
                'notifikasi',
                [
                    'text' => 'Kode Peminjaman Sudah Digunakan',
                    'icon' => 'error',
                    'title_alert' => 'Gagal',
                ]
            );
        }

        // logika jika status buku sudah dipinjam
        $kodeBukuSelected = DB::table('buku')->where('kode_buku', $request->kode_buku)->first();
        if ($kodeBukuSelected) {
            // Jika status buku sudah 0, kembalikan pesan kesalahan
            if ($kodeBukuSelected->status_buku === 0) {
                return redirect()->route('peminjaman.create')->with(
                    'notifikasi',
                    [
                        'text' => 'Buku Sedang Dipinjam',
                        'icon' => 'error',
                        'title_alert' => 'Gagal',
                    ]
                );
            }
        }

        // jika kedua di atas tidak ada maka masukkan
        Peminjaman::create([
            'kode_pinjam' => $request->kode_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'kode_buku' => $request->kode_buku,
            'kode_anggota' => $request->kode_anggota
        ]);

        // ubah tabel buku status buku menjadi dipinjam
        DB::table('buku')->where('kode_buku', $request->kode_buku)->update([
            'status_buku' => 0]
        );

        return redirect()->route('peminjaman.index')->with(
            'notifikasi',
            [
                'text' => 'Buku Berhasil Dipinjam',
                'icon' => 'success',
                'title_alert' => 'Berhasil',
            ]
        );

    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $mpeminjaman, string $idpinjam)
    {
        //
        // return view('buku.index',['title' => 'buku']);
        return view('peminjaman.edit', [
            'title' => 'Edit',
            'peminjaman' => $mpeminjaman->findOrFail($idpinjam)
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $mpeminjaman, string $id)
    {
        //
        $rubahPeminjaman = $mpeminjaman->findOrFail($id);
        if ($rubahPeminjaman) {
            $buku = DB::table('buku')->where('kode_buku', $request->kode_buku);
            $buku->update([
                'status_buku' => 1],
            );

            DB::table('peminjaman')->where('kode_buku', $request->kode_buku)->update([
                'tanggal_kembali' => $request->tanggal_kembali,
            ]);
            // $buku = DB::table('buku')->where('kode_buku', $request->kode_buku);
            // $mpeminjaman->update([
            //     'tanggal_kembali' => $request->tanggal_kembali,
            // ]);

            return redirect()->route('peminjaman.index')->with(
                'notifikasi',
                [
                    'text' => 'Buku Berhasil Dikembalikan',
                    'icon' => 'success',
                    'title_alert' => 'Berhasil',
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $mpeminjaman, string $idpinjam, Request $request)
    {
        //
        $pinjamToDelete = $mpeminjaman->findOrFail($idpinjam);
        $pinjamToDelete->delete();
        DB::table('buku')->where('kode_buku', $request->kode_buku)->update([
            'status_buku' => 1],
        );
        // ambil nama anggota namanya taruh di sweetalert
        return redirect()->route('peminjaman.index')->with(
            'notifikasi',
            [
                'text' => 'Peminjaman Berhasil Dihapus !, Buku Berhasil Dikembalikan',
                'icon' => 'success',
                'title_alert' => 'Berhasil',
            ]
        );
    }
}
