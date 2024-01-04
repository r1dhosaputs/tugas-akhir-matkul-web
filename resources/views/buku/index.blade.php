@extends('main.main')

@section('page-body')
@section('am-title')
    List Buku
@endsection
<div class="card">
    <div class="card-header pt-5" style="padding-bottom: 0">
        <a href="{{ route('buku.create') }}" class="btn btn-primary mb-3 ">Tambah Buku</a>
    </div>
    <div class="card-body" style="padding-top: 0">
        <div class="table-responsive">
            <table id="tabelbuku" class="table-hover table-bordered mg-b-0 table">
                <thead class="bg-info">
                    <tr class="">
                        <th>No</th>
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Jenis Buku</th>
                        <th>Pengarang</th>
                        <th>Tahun Terbit</th>
                        <th>Status Buku</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($buku as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $row->kode_buku }}</td>
                            <td>{{ $row->judul_buku }}</td>
                            <td>{{ $row->jenis_buku }}</td>
                            <td>{{ $row->pengarang }}</td>
                            <td>{{ $row->tahun_terbit }}</td>
                            <td>
                                @if ($row->status_buku == 1)
                                    <h5 class="text-center"><span class="badge bg-success">Ada</span></h5>
                                @elseif ($row->status_buku == 0)
                                    <h5 class="text-center"><span class="badge bg-secondary">Dipinjam</span></h5>
                                @else
                                    <h5 class="text-center"><span class="badge bg-danger">Tidak Diketahui</span></h5>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-row flex-wrap gap-2">
                                    {{-- mengirimkan masing-masing id --}}
                                    <a href="{{ route('buku.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm text-light">Edit</a>
                                    <form method="POST" action="{{ route('buku.destroy', $row->id) }}"
                                        class="delete">
                                        @csrf
                                        {{-- karena tidak ada method pada form delete maka delete @method --}}
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" id="delete"
                                            onclick="deleteAction()" style="cursor: pointer">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($buku) == 0)
                {{-- <h1 class="text-danger text-center">Data Buku Kosong</h1> --}}
            @endif
        </div>
    </div>
</div>

@endsection
