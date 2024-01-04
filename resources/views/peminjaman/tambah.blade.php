@extends('main.main')

@section('page-body')
    <div class="row justify-content-center">
        <div class="card col-md-6 p-0">
            <div class="card-header">
                Tambah Peminjam
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-2">
                        <label for="kode_pinjam" class="form-label">Kode Peminjaman</label>
                        <input type="text" name="kode_pinjam" id="kode_pinjam"
                            class="form-control value{{ old('kode_pinjam') }}" placeholder="Kode Peminjaman">
                        @error('kode_pinjam')
                            <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="nama_anggota">Nama Anggota</label>
                        <select name="kode_anggota" class="form-control" required id="nama_anggota">
                            <option disabled value="" selected>~Select~</option>
                            @foreach ($anggota as $row)
                                <option value="{{ $row->kode_anggota }}">{{ $row->nama_anggota }}</option>
                            @endforeach
                        </select>
                        @error('nama_anggota')
                            <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="judul_buku">Judul Buku</label>
                        <select name="kode_buku" class="form-control" required id="judul_buku">
                            <option disabled value="" selected>~Select~</option>
                            @foreach ($buku as $row)
                                <option value="{{ $row->kode_buku }}">{{ $row->judul_buku }}</option>
                            @endforeach
                        </select>
                        @error('judul_buku')
                            <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-2">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" class="form-control" required id="tanggal_pinjam">
                        @error('tanggal_pinjam')
                            <p class="text-danger mb-0">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between mt-3 flex-row flex-wrap">
                        <a class="btn btn-dark" href="{{ route('peminjaman.index') }}">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
