<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Buku $mbuku)
    {
        //
        // $buku = Buku::get();
        // compact variabel $buku
        return view('buku.index', [
            'title' => 'List',
            'buku' => $mbuku->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('buku.tambah', [
            'title' => 'Tambah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Buku $mbuku)
    {
        // variabel $this mengarah ke objek controller yang sedang digunakan misal bukucontroller classnya catatan haja ini wkwk

        $validate = $request->validate([
            'kode_buku' => ['required', 'min:5', 'max:12', 'unique:buku'],
            'judul_buku' => ['required'],
            'jenis_buku' => ['required'],
            'pengarang' => ['required'],
            'tahun_terbit' => ['required'],
            'status_buku' => ['required'],
        ]);

        if ($validate) {
            $mbuku->create($validate);
            return redirect()->route('buku.index')->with(
                'notifikasi',
                [
                    'text' => 'Buku Berhasil Ditambahkan',
                    'icon' => 'success',
                    'title_alert' => 'Berhasil',
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $mbuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $mbuku, string $id)
    {
        //
        // $buku = Buku::findOrFail($id);
        return view('buku.edit', [
            'title' => 'Edit',
            'buku' => $mbuku->findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $mbuku, string $id)
    {

        $bukuToUpdate = $mbuku->findOrFail($id);

        $validate = $request->validate([
            'kode_buku' => ['required', 'min:5', 'max:12', 'unique:buku,kode_buku,' . $id],
            'judul_buku' => ['required'],
            'jenis_buku' => ['required'],
            'pengarang' => ['required'],
            'tahun_terbit' => ['required'],
            'status_buku' => ['required'],
        ]);

        if ($validate) {
            $bukuToUpdate->update($validate);
            return redirect()->route('buku.index')->with(
                'notifikasi',
                [
                    'text' => 'Buku Berhasil Di Edit !',
                    'icon' => 'success',
                    'title_alert' => 'Berhasil',
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $mbuku, string $id)
    {
        //
        // $buku = Buku::findOrFail($id);
        $bukuToDelete = $mbuku->findOrFail($id);
        $bukuToDelete->delete();
        // ambil nama anggota namanya taruh di sweetalert
        $judulBuku = $bukuToDelete->judul_buku;
        return redirect()->route('buku.index')->with(
            'notifikasi',
            [
                'text' => 'Buku Dengan Nama '. $judulBuku .' Berhasil Di Hapus !',
                'icon' => 'success',
                'title_alert' => 'Berhasil',
            ]
        );
    }
}
