{{-- @dd($peminjaman->kode_buku) --}}
@extends('main.main')

@section('page-body')
@section('am-title')
    Kembalikan Buku
@endsection
<div class="row justify-content-center">
    <div class="card col-md-6 p-0">
        <div class="card-header">
            <h5 class="mt-3">Kembalikan Peminjaman Buku???</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}">
                    @csrf
                    @method('put', 'post')
                    <input type="hidden" name="kode_buku" value="{{ $peminjaman->kode_buku }}">
                    <label for="tanggalkembali">Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" id="" class="form-control">

                    <div class="mt-3">
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
                            <a href="{{ route('peminjaman.index') }}" class="btn btn-dark">Batal</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
