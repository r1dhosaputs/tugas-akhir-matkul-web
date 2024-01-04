@extends('main.main')

@section('page-body')
@section('am-title')
    Edit Anggota
@endsection
<div class="row justify-content-center">
    <div class="card col-md-6 p-0">
        <div class="card-header">
            Edit Anggota
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('anggota.update', $anggota->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-2">
                    <label for="kode_anggota" class="form-label fw-medium">KD Anggota</label>
                    <input class="form-control" type="text" name="kode_anggota" id="kode_anggota"
                        placeholder="Kode Anggota" value={{ old('kode_anggota', $anggota->kode_anggota) }}>

                </div>
                <div class="mb-2">
                    <label for="nama_anggota" class="form-label fw-medium">Nama Anggota :</label>
                    <input class="form-control" type="text" name="nama_anggota" id="nama_anggota"
                        placeholder="Nama Anggota" value={{ old('nama_anggota', $anggota->nama_anggota) }}>
                </div>
                <div class="mb-2">
                    <label for="Alamat" class="form-label fw-medium">Alamat :</label>
                    <input class="form-control" type="text" name="alamat" id="Alamat" placeholder="Alamat"
                        value={{ old('alamat', $anggota->alamat) }}>

                </div>
                <div class="mb-2">
                    <label for="no_telpon" class="form-label fw-medium">No Telp :</label>
                    <input type="text" name="no_telpon" id="no_telpon" class="form-control" placeholder="No Telp"
                        value={{ old('no_telpon', $anggota->no_telpon) }}>

                </div>

                <div class="mb-2">
                    <label for="jenis_kelamin" class="form-label fw-medium">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                        {{-- <option disabled value="" selected>~Select~</option> --}}
                        <option value="0" {{ $anggota->jenis_kelamin === 0 ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="1" {{ $anggota->jenis_kelamin === 1 ? 'selected' : '' }}>Perempuan</option>
                    </select>
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
