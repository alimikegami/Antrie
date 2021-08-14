$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    
    $("button").click(function() {
        id_element = $(this).attr('id');
        slug_antrean = $('#slug-antrean').val();
        if(id_element.includes("tombol-ambil-antrian-")){
            id_next_element = $(this).next().attr('id');
            slug_loket = $("#" + id_next_element).val();
            $.ajax({
                url: "/konfirmasi-antrean/" + slug_antrean + "/loket/" + slug_loket + "/ambil-nomor",
                type: "GET",
                success: function (data) {
                    $('#nomor-antrean-modal').html(data.nomor_antrean);
                    $('#nama-antrean-modal').html(data.nama_antrean);
                    $('#nama-loket-modal').html(data.nama_loket);
                    $('#modal-ambil-nomor').modal('show');

                },
            });
            
        };
    });
});