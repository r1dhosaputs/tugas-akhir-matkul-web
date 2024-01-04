@extends('main.main')

@section('page-body')
@section('am-title')
    List Petugas
@endsection
<div class="card">
    <div class="card-header">
        {{-- <h5 class="mt-3">Data </h5> --}}
        <a href="{{ route('petugas.tambah') }}" class="btn btn-primary mb-3">Tambah Petugas</a>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="tabelpetugas" class="table-hover table-bordered mg-b-0 table">
                <thead class="bg-warning">
                    <tr class="">
                        <th>KD Petugas</th>
                        <th>Nama Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $row)
                        <tr>
                            <td>
                                {{ $row->kode_petugas }}
                            </td>
                            <td>
                                {{ $row->nama_petugas }}
                            </td>
                            <td>
                                <div class="d-flex flex-row flex-wrap gap-2">
                                    <a href="{{ route('petugas.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('petugas.delete', $row->id) }}" method="POST"
                                        class="delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteAction()"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>


                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($petugas) == 0)
                <h1 class="text-danger text-center">Data Petugas Kosong</h1>
            @endif
        </div>
    </div>
</div>


@endsection
