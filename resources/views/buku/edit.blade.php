{{-- @dd($buku->id) --}}
@extends('main.main')

@section('page-body')
@section('am-title')
    Edit Buku
@endsection
<div class="row justify-content-center">
    <div class="card col-md-6 p-0">
        <div class="card-header">
            Tambah Buku
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put') {{-- karena tidak ada method put pada html form --}}
                <div class="mb-3">
                    <label for="kodebuku" class="form-label">Kode Buku :</label>
                    <input type="text" class="form-control" name="kode_buku" id="kodebuku"
                        value={{ old('kode_buku', $buku->kode_buku) }} >
                    @error('kode_buku')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="judulbuku" class="form-label">Judul Buku :</label>
                    <input type="text" class="form-control" name="judul_buku"
                        value={{ old('judul_buku', $buku->judul_buku) }} required>
                    @error('judul_buku')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="jenisbuku">Jenis Buku :</label>
                    <select class="form-control select2" name="jenis_buku" id="jenisbuku" required>
                        <option value="Komik" {{ $buku->jenis_buku == 'Komik' ? 'selected' : '' }}>Komik</option>
                        <option value="Novel" {{ $buku->jenis_buku == 'Novel' ? 'selected' : '' }}>Novel</option>
                        <option value="Pelajaran" {{ $buku->jenis_buku == 'Pelajaran' ? 'selected' : '' }}>Pelajaran
                        </option>
                    </select>
                    @error('jenis_buku')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="pengarang">Pengarang :</label>
                    <input type="text" class="form-control" name="pengarang"
                        value="{{ old('pengarang', $buku->pengarang) }}" required>
                    @error('pengarang')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tahunterbit">Tahun Terbit :</label>
                    <input type="number" class="form-control" name="tahun_terbit"
                        value={{ old('tahun_terbit', $buku->tahun_terbit) }} required>
                    @error('tahun_terbit')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="statusbuku" id="statusbuku">Status Buku :</label>
                    <select statusbuku name="status_buku" class="form-control select2" required>
                        <option value="1" {{ $buku->status_buku == '1' ? 'selected' : '' }}>Ada</option>
                        <option value="0" {{ $buku->status_buku == '0' ? 'selected' : '' }}>Dipinjam</option>
                    </select>
                    @error('status_buku')
                        <p class="text-danger mb-0">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('buku.index') }}" class="btn btn-dark">Kembali</a>
            </form>

        </div>
    </div>
</div>
@endsection
