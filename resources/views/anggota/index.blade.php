@extends('main.main')

@section('page-body')
@section('am-title')
    List Anggota
@endsection
<div class="card">
    <div class="card-header pt-5" style="padding-bottom: 0">
        <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>
    </div>
    <div class="card-body" style="padding-top: 0">
        <div class="table-responsive">
            <table id="tabelanggota" class="table-hover table-bordered mg-b-0 table">
                <thead class="bg-danger">
                    <tr class="">
                        <th>No</th>
                        <th>Kode</th>
                        {{-- <th>Gambar</th> --}}
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Kelamin</th>
                        <th>Aksi</th>
                    </tr>
                <tbody>
                    @foreach ($anggota as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->kode_anggota }}</td>
                            {{-- <td style="width: 10%">
                                <img src="https://i.pinimg.com/736x/e6/6e/55/e66e5584f16ed29d34fde4897ab2deb6.jpg" class="costum-img img-fluid" alt="">
                            </td> --}}
                            <td>{{ $row->nama_anggota }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->no_telpon }}</td>
                            <td>
                                @if ($row->jenis_kelamin === 0)
                                    Laki-Laki
                                @elseif ($row->jenis_kelamin === 1)
                                    Perempuan
                                @else
                                    Tdk Diketahui
                                @endif
                            </td>
                            <td>
                                <div class="d-flex flex-row flex-wrap gap-2">
                                    {{-- mengirimkan masing-masing id --}}
                                    <a href="{{ route('anggota.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm text-light">Edit</a>
                                    {{-- hapus berdasarkan id --}}
                                    <form onsubmit="deleteAnggota()" method="POST"
                                        action="{{ route('anggota.destroy', $row->id) }}" class="delete">
                                        @csrf
                                        {{-- karena tidak ada method pada form delete maka delete @method --}}
                                        @method('DELETE')
                                        <button type="button" class="btn btn-dark btn-sm" style="cursor: pointer"
                                            onclick="deleteAction()" id="delete">Delete</button>
                                    </form>
                                </div>
                                {{-- Konfirmasi Delete Apakah Yakin? --}}
                                {{-- <script>
                                    function deleteAnggota() {
                                        Swal.fire({
                                            title: 'Apakah Anda Yakin?',
                                            text: 'Data Tidak Akan Kembali',
                                            icon: 'warning',
                                            showCancelButton: true,
                                            confirmButtonText: 'Hapus',
                                            cancelButtonText: 'Batal',
                                            reverseButtons: true
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                var deleteBukuForms = document.querySelectorAll('.deleteanggota');
                                                // Melakukan iterasi pada nodeList menggunakan forEach
                                                deleteBukuForms.forEach(function(form) {
                                                    // Menggunakan submit pada elemen form yang di klik salah satu
                                                    form.submit();
                                                });

                                            }
                                        });
                                    }
                                </script> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            @if (count($anggota) == 0)
                {{-- <h1 class="text-danger text-center">Data Anggota Kosong</h1> --}}
            @endif
        </div>
    </div>


@endsection
