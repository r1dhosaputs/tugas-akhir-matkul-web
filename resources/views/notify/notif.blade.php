{{-- Notif Sukses Di Hapus,Edit,Delete --}}
@if (session('notifikasi'))
    <h1>tes ada</h1>
    <script>
        Swal.fire({
            title: "{{ session('notifikasi.title_alert') }}",
            text: "{{ session('notifikasi.text') }}",
            icon: "{{ session('notifikasi.icon') }}"
        });
    </script>
@endif

{{-- Konfirmasi Delete Apakah Yakin? --}}
<script>
    function deleteAction() {
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
                var deleteForms = document.querySelectorAll('.delete');
                // Melakukan iterasi pada nodeList menggunakan forEach
                deleteForms.forEach(function(form) {
                    // Menggunakan submit pada elemen form yang di klik salah satu
                    form.submit();
                });

            }
        });
    }
</script>
