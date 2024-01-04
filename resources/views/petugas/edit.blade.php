@extends('main.main')

@section('page-body')
@section('am-title')
    Edit Petugas
@endsection
<div class="row justify-content-center">
    <div class="card col-md-6 p-0">
        <div class="card-header">
            Edit Petugas
        </div>
        <div class="card-body">
            <form action="{{ route('petugas.simpan_edit', $petugas->id) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="kode_petugas" class="form-label fw-medium">KD Petugas</label>
                    <input type="text" name="kode_petugas" id="kode_petugas" placeholder="Kode Petugas"
                        class="form-control" value="{{ old('kode_petugas', $petugas->kode_petugas) }}">
                </div>
                <div class="mb-3">
                    <label for="nama_petugas" class="form-label fw-medium">Nama Petugas</label>
                    <input type="text" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas"
                        class="form-control" value="{{ old('nama_petugas', $petugas->nama_petugas) }}">
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ route('petugas.index') }}" class="btn btn-dark">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
