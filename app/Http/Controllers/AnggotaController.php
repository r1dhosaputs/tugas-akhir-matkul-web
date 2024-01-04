<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Validation\ValidationException;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Anggota $manggota)
    {
        //
        // $anggota = Anggota::get();
        return view('anggota.index', [
            'title' => 'List',
            'anggota' => $manggota->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('anggota.tambah', [
            'title' => 'Tambah',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Anggota $manggota)
    {
        //
        // return $request;
        $validate = $request->validate([
            'kode_anggota' => ['required', 'unique:anggota'],
            'nama_anggota' => ['required'],
            'alamat' => ['required'],
            'no_telpon' => ['required', 'numeric'],
            'jenis_kelamin' => ['required'],
        ]);

        if ($validate) {
            $manggota->create($validate);
            return redirect()->route('anggota.index')->with(
                'notifikasi',
                [
                    'text' => 'Anggota Berhasil Ditambahkan',
                    'icon' => 'success',
                    'title_alert' => 'Berhasil',
                ]
            );
        }

        // return $validate;
    }

    // public function store(Request $request, Anggota $anggota, Session $session)
    // {
    //     try {
    //         $validatedData = $request->validate([
    //             'kode_anggota' => ['required', 'unique:anggota'],
    //             'nama_anggota' => ['required'],
    //             'alamat' => ['required'],
    //             'no_telpon' => ['required', 'numeric'],
    //             'jenis_kelamin' => ['required'],
    //         ]);

    //         // Validasi berhasil, lakukan sesuatu seperti menyimpan ke database.
    //         $anggota->create($validatedData);

    //         // Setelah berhasil, berikan pesan sukses.
    //         return redirect('anggota.index')->with([
    //             'notifikasi' => [
    //                 'text' => 'Anggota Berhasil Ditambahkan',
    //                 'icon' => 'success',
    //                 'title_alert' => 'Berhasil',
    //             ],
    //         ]);
    //     } catch (ValidationException $e) {
    //         // Validasi gagal, dapatkan pesan kesalahan.
    //         // $errors = $e->errors();

    //         // // Simpan pesan kesalahan dalam session flash.
    //         // return redirect('anggota.index')->with([
    //         //     'notifikasi' => [
    //         //         'text' => 'Gagal Mohon Periksa Lagi',
    //         //         'icon' => 'error',
    //         //         'title_alert' => 'Gagal',
    //         //     ],
    //         // ])->withErrors($errors)->withInput();

    //         // Validasi gagal, dapatkan pesan kesalahan.
    //         $errors = $e->errors();

    //         // Simpan pesan kesalahan dalam session flash.
    //         Session::flash('notifikasi', [
    //             'text' => 'Gagal Mohon Periksa Lagi',
    //             'icon' => 'error',
    //             'title_alert' => 'Gagal',
    //         ]);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(Anggota $manggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anggota $manggota, string $id)
    {
        return view('anggota.edit', [
            'title' => 'Edit',
            'anggota' => $manggota->findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Anggota $manggota, string $id)
    {
        // Gunakan findOrFail untuk mencari anggota berdasarkan ID , dapatnya di database ini nih
        $anggotaToUpdate = $manggota->findOrFail($id);

        $validate = $request->validate([
            'kode_anggota' => ['required', 'unique:anggota,kode_anggota,' . $id],
            //'unique:anggota,kode_anggota,' . $id
            // diizinkan untuk menyimpan nilai yang sudah ada dalam field 'kode_anggota' asalkan rekaman tersebut adalah rekaman dengan ID yang sama dengan nilai $id
            // Menyatakan bahwa nilai field harus bersifat unik dalam tabel 'buku', kolom 'kode_buku', kecuali jika ID yang dimaksudkan adalah $id. Ini digunakan untuk memungkinkan validasi yang mengabaikan data saat melakukan pembaruan (update), sehingga data dengan ID yang sama tidak dianggap konflik dengan validasi unik.
            'nama_anggota' => ['required'],
            'alamat' => ['required'],
            'no_telpon' => ['required', 'numeric'],
            'jenis_kelamin' => ['required'],
        ]);

        // Cek apakah validasi berhasil
        if ($validate) {
            // meambil nama anggota dari id yang di edit kd perlu pang si
            // $namaAnggota = $anggotaToUpdate->nama_anggota;
            // Perbarui atribut anggota dengan data yang divalidasi
            $anggotaToUpdate->update($validate);
            return redirect()->route('anggota.index')->with(
                'notifikasi',
                [
                    'text' => 'Anggota Berhasil Di Edit !',
                    'icon' => 'success',
                    'title_alert' => 'Berhasil',
                ]
            );
        }
    }

    // public function update(Request $request, Anggota $anggota, string $id)
    // {
    //     $anggota = Anggota::findOrFail($id);
    //     $anggota->update([
    //         'kode_anggota' => $request->kode_anggota,
    //         'nama_anggota' => $request->nama_anggota,
    //         'alamat' => $request->alamat,
    //         'no_telpon' => $request->no_telpon,
    //         'jenis_kelamin' => $request->jenis_kelamin
    //     ]);

    //     return redirect()->route('anggota.index')->with([
    //         'alerttext' => 'Data Berhasil Di Edit!',
    //         'sweetalert' => 'success',
    //     ]);
    //     ;
    // }


    /**
     
     * Remove the specified resource from storage.
     */
    public function destroy(Anggota $manggota, string $id)
    {
        //
        $anggotaToDelete = $manggota->findOrFail($id);
        $anggotaToDelete->delete();
        // ambil nama anggota namanya taruh di sweetalert
        $namaAnggota = $anggotaToDelete->nama_anggota;
        // $anggota->findOrFail($id)->delete();
        return redirect()->route('anggota.index')->with(
            'notifikasi',
            [
                'text' => 'Anggota Dengan Nama ' . $namaAnggota . ' Berhasil Dihapus',
                'icon' => 'success',
                'title_alert' => 'Berhasil',
            ]
        );
    }
}
