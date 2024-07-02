
$(document).ready(function(){

    $('.top-menu-dropdown').addClass('animate__animated animate__fadeInDown')
    $('.modal-delete').addClass('animate__animated animate__zoomInDown')
    $('.card').addClass('smooth-shadow')

    new DataTable('.datatables', {
        responsive: true,
        paging: true,
        searching: true,
        info: false,
        pagingType: "simple_numbers",
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data per halaman",
        },
        "order": [], // Kosongkan untuk menonaktifkan pengurutan otomatis
        "columnDefs": [
            {
                "targets": [1], // Kolom ke-2 (index dimulai dari 0)
                "orderable": true // Aktifkan pengurutan untuk kolom ini
            }
        ]
    });

    // Toggle menu
    $('.nav-top-toggle-menu').on('click', function(){
        $('body').toggleClass('open-menu');
    });

});




