@extends('main.main')

@section('page-body')
@section('am-title')
    Tambah Petugas
@endsection
<div class="row justify-content-center">
    <div class="card col-md-6 p-0">
        <div class="card-header">
            Tambah Petugas
        </div>
        <div class="card-body">
            <form action="{{ route('petugas.simpan') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="kode_petugas" class="form-label fw-medium">KD Petugas</label>
                    <input type="text" name="kode_petugas" id="kode_petugas" placeholder="Kode Petugas"
                        class="form-control">
                    @error('kode_petugas')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="nama_petugas" class="form-label fw-medium">Nama Petugas</label>
                    <input type="text" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas"
                        class="form-control">
                    @error('nama_petugas')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('petugas.index') }}" class="btn btn-dark">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
