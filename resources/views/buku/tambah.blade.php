@extends('main.main')

@section('page-body')
@section('am-title')
    Tambah Buku
@endsection
<div class="row justify-content-center">
    <div class="card col-md-6 p-0">
        <div class="card-header">
            Tambah Buku
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <label for="kode" class="form-label fw-medium">Kode Buku :</label>
                    <input class="form-control" type="text" name="kode_buku" id="kode" placeholder="Kode Buku">
                    @error('kode_buku')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="judul" class="form-label fw-medium">Judul Buku :</label>
                    <input class="form-control" type="text" name="judul_buku" id="judul"
                        placeholder="Judul Buku">
                    @error('judul_buku')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="jenisbuku" class="form-label fw-medium">Jenis Buku</label>
                    <select name="jenis_buku" id="jenisbuku" class="form-control select2">
                        <option disabled value="" selected>~Select~</option>
                        <option value="Komik">Komik</option>
                        <option value="Majalah">Majalah</option>
                        <option value="Pelajaran">Pelajaran</option>
                    </select>
                    @error('jenis_buku')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="pengarang" class="form-label fw-medium">Pengarang :</label>
                    <input class="form-control" type="text" name="pengarang" id="pengarang" class=""
                        placeholder="Nama Pengarang">
                    @error('pengarang')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="tahunterbit" class="form-label fw-medium">Tahun Terbit :</label>
                    <input class="form-control" id="tahun-terbit" type="number" name="tahun_terbit"
                        placeholder="Tahun Terbit">
                    @error('tahun_terbit')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="statusbuku" class="form-label fw-medium">Status Buku :</label>
                    <select name="status_buku" id="status_buku" class="form-control select2">
                        <option value="" selected disabled>~Select~</option>
                        <option value="1">Ada</option>
                        <option value="0">Dipinjam</option>
                    </select>
                    @error('status_buku')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mt-3 flex-row flex-wrap">
                    <a class="btn btn-dark" href="{{ route('buku.index') }}">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
