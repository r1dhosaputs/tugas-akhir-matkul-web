<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::get();
        return view('petugas.index', [
            'petugas' => $petugas,
            'title' => 'List'
        ]);
    }

    public function tambah()
    {
        return view('petugas.tambah', [
            'title' => 'Tambah',
        ]);
    }

    public function simpan(Request $request, Petugas $mpetugas)
    {
        $validate = $request->validate([
            'kode_petugas' => ['required', 'unique:petugas,kode_petugas'],
            'nama_petugas' => ['required'],
        ]);

        if ($validate) {
            $mpetugas->create($validate);
            return redirect()->route('petugas.index')->with(
                'notifikasi',
                [
                    'text' => 'Petugas Berhasil Ditambahkan',
                    'icon' => 'success',
                    'title_alert' => 'Berhasil',
                ]
            );
        }

    }

    public function edit(Petugas $petugas, string $id)
    {
        return view('petugas.edit', [
            'title' => 'Edit',
            'petugas' => $petugas->findOrFail($id),
        ]);

    }

    public function simpan_edit(Request $request, Petugas $mpetugas, string $id)
    {

        $petugasToUpdate = $mpetugas->findOrFail($id);

        $validate = $request->validate([
            'kode_petugas' => ['required', 'unique:petugas,kode_petugas,' . $id],
            //'unique:anggota,kode_anggota,' . $id
            // diizinkan untuk menyimpan nilai yang sudah ada dalam field 'kode_anggota' asalkan rekaman tersebut adalah rekaman dengan ID yang sama dengan nilai $id
            // Menyatakan bahwa nilai field harus bersifat unik dalam tabel 'buku', kolom 'kode_buku', kecuali jika ID yang dimaksudkan adalah $id. Ini digunakan untuk memungkinkan validasi yang mengabaikan data saat melakukan pembaruan (update), sehingga data dengan ID yang sama tidak dianggap konflik dengan validasi unik.
            'nama_petugas' => ['required'],
        ]);

        // Cek apakah validasi berhasil
        if ($validate) {
            $petugasToUpdate->update($validate);
            return redirect()->route('petugas.index')->with(
                'notifikasi',
                [
                    'text' => 'Petugas Berhasil Di Edit !',
                    'icon' => 'success',
                    'title_alert' => 'Berhasil',
                ]
            );


        }

        // $petugas = Petugas::findOrFail($id);
        // $petugas->update([
        //     'kode_petugas' => $request->kode_petugas,
        //     'nama_petugas' => $request->nama_petugas,
        // ]);

        // return redirect()->route('petugas.index')->with([
        //     'alerttext' => 'Data Berhasil Di Edit!',
        //     'sweetalert' => 'success',
        // ]);
    }

    public function delete(string $id, Petugas $mpetugas)
    {

        $petugasToDelete = $mpetugas->findOrFail($id);
        $petugasToDelete->delete();
        $namaPetugas = $petugasToDelete->nama_petugas;
        return redirect()->route('petugas.index')->with(
            'notifikasi',
            [
                'text' => 'Petugas Dengan Nama ' . $namaPetugas . ' Berhasil Dihapus',
                'icon' => 'success',
                'title_alert' => 'Berhasil',
            ]
        );

        // $petugas = Petugas::findOrFail($id);
        // $petugas->delete();
        // return redirect()->route('petugas.index')->with([
        //     'alerttext' => 'Data Berhasil Dihapus!',
        //     'sweetalert' => 'success',
        // ]);
    }
}
