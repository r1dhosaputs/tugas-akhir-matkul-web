$('#tabelbuku').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        lengthMenu: '_MENU_ Item/Page',
    },
    columnDefs: [
        { orderable: false, targets: 7 },
        { orderable: false, targets: 6 },
    ] // kolom aksi kolom 6,7 di hentikan orderablenya
});

// console.log('halo')

$('#tabelanggota').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        lengthMenu: '_MENU_ Item/Page',
    },
    columnDefs: [
        { orderable: false, targets: 5 },
        { orderable: false, targets: 6 },
    ] // kolom aksi kolom 6,7 di hentikan orderablenya
});

$('#tabelpetugas').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        lengthMenu: '_MENU_ Item/Page',
    },
    columnDefs: [
        { orderable: false, targets: 2 },
    ] // kolom aksi kolom 6,7 di hentikan orderablenya
});
