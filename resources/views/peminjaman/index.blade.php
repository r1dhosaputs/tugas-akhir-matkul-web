@extends('main.main')

@section('page-body')
@section('am-title')
    Peminjaman
@endsection
<div class="card">
    <div class="card-header">
        <h5 class="mt-3">Data Peminjaman Buku</h5>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm">
            Tambah Data Peminjam
        </a>
    </div>
    <div class="card-body">
        <table id="tabelpeminjaman" class="table-hover table-bordered mg-b-0 table">
            <thead class="">
                <tr>
                    <th>No</th>
                    <th>No Pinjam</th>
                    <th>Nama Peminjaman</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjam as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kode_pinjam }}</td>
                        <td>{{ $row->nama_anggota }}</td>
                        <td>{{ $row->judul_buku }}</td>
                        <td>{{ $row->tanggal_pinjam }}</td>
                        <td>{{ $row->tanggal_kembali }}</td>
                        <td>
                            <div class="d-flex flex-row flex-wrap gap-2">
                                <a href="{{ route('peminjaman.edit', $row->idpinjam) }}"
                                    class="btn btn-warning btn-sm text-light">Edit</a>
                                <form method="POST" action="{{ route('peminjaman.destroy', $row->idpinjam) }}"
                                    class="delete">
                                    @csrf
                                    {{-- karena tidak ada method pada form delete maka delete @method --}}
                                    @method('DELETE')
                                    <input type="hidden" name="kode_buku" value="{{ $row->kode_buku }}">
                                    <button type="button" class="btn btn-danger btn-sm" id="delete"
                                        onclick="deleteAction()" style="cursor: pointer">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
