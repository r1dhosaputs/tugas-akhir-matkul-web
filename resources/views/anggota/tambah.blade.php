@extends('main.main')

@section('page-body')
@section('am-title')
    Tambah Anggota
@endsection
<div class="row justify-content-center">
    <div class="card col-md-6 p-0">
        <div class="card-header">
            Tambah Anggota
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('anggota.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="kode_anggota" class="form-label fw-medium">KD Anggota</label>
                    <input class="form-control" type="text" name="kode_anggota" id="kode_anggota"
                        placeholder="Kode Anggota">
                    @error('kode_anggota')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="nama_anggota" class="form-label fw-medium">Nama Anggota :</label>
                    <input class="form-control" type="text" name="nama_anggota" id="nama_anggota"
                        placeholder="Nama Anggota">
                    @error('nama_anggota')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="Alamat" class="form-label fw-medium">Alamat :</label>
                    <input class="form-control" type="text" name="alamat" id="Alamat" placeholder="Alamat">
                    @error('alamat')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="no_telpon" class="form-label fw-medium">No Telp :</label>
                    <input type="text" name="no_telpon" id="no_telpon" class="form-control" placeholder="No Telp">
                    @error('no_telpon')
                        <div class="text-danger mb-0">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="mb-2">
                    <label for="jenis_kelamin" class="form-label fw-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                        <option disabled value="" selected>~Select~</option>
                        <option value="0">Laki-Laki</option>
                        <option value="1">Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mt-3 flex-row flex-wrap">
                    <a class="btn btn-dark" href="{{ route('anggota.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
