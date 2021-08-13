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

    // (function updateJumlahAntrean() {
    //     let id = $('#inputRiwayatAntreanId').val();
    //     let id_loket = $("#inputLoketId").val();

    //     if ((id == undefined) && (id == null) && !(id == "")) {
    //       id = -1;
    //     }

    //     $.ajax({
    //         url: "/hitung-antrean-di-belakang",
    //         data: {
    //           id: id,
    //           id_loket: id_loket
    //         },
    //         success: function (data) {
    //             $("#jumlahPenunggu").text(data);
    //             console.log(id);
    //         },
    //         complete: function () {
    //             // Schedule the next request when the current one's complete
    //             setTimeout(updateJumlahAntrean, 1000);
    //         },
    //     });
    // })();


    // $('#fullpage').fullpage({
    // 	//options here
    // 	autoScrolling:true,
    //     controlArrows: true,
    //     navigation: true,
    //     slidesNavigation: true,
    //     scrollOverflow: true,
    //     dragAndMove: true,
    //     afterLoad: function(origin, destination, direction) {
    //         if (destination.index === 0 || destination.index === 2 || destination.index === 4) {
    //             $('.navbar').css('background-color', '#FFFFFF');
    //             $('#navbar-logo').attr('src', 'img/logoAntriedark.png');
    //             $('.nav-link').css('color', '#5D5D83');
    //         }else if (destination.index === 3){
    //             $('.navbar').css('background-color', '#FFE77A');
    //             $('#navbar-logo').attr('src', 'img/logoAntriedark.png');
    //             $('.nav-link').css('color', '#5D5D83');
    //         }else {
    //             $('.navbar').css('background-color', '#4DB0FF');
    //             $('#navbar-logo').attr('src', 'img/logoAntrielight.png');
    //             $('.nav-link').css('color', '#FFFFFF');
    //         }

    //       },
    // });

    // homepage kelebihan pengantre dan pembuat antrean
    $('#kelebihan-pembuat-antrean').on('click', ()=>{
        $('.word-pembuat-antrean ul').slideToggle();
        $('#tambah-pembuat-antrean').toggleClass('fa-plus fa-minus');
    });

    $('#kelebihan-pengantre').on('click', ()=>{
        $('.word-pengantre ul').slideToggle();
        $('#tambah-pengantre').toggleClass('fa-plus fa-minus');
    });

    // card flip homepage
    $('.kemudahan-kenapa-pilih').flip();
    $('.kecepatan-kenapa-pilih').flip();
    $('.fleksibilitas-kenapa-pilih').flip();


    // menu pengguna
    $('.menu-dashboard').on('click', function(){
        $('.menu').removeClass('selected');
        $(this).addClass('selected');
    });
    $('.menu-antrian').on('click', function(){
        $('.menu').removeClass('selected');
        $(this).addClass('selected');
    });
    $('.menu-pesan').on('click', function(){
        $('.menu').removeClass('selected');
        $(this).addClass('selected');
    });
    $('.menu-profil').on('click', function(){
        $('.menu').removeClass('selected');
        $(this).addClass('selected');
    });

    // tombol ambil antrian di klik
    $('.content-field-lokasi #tombol-ambil-antrian').click(()=>{
      $('#modal-ambil-nomor').modal('show');
    })

    // tombol menu halaman antrianku
    $('.menu-pengantri').click(function(){
      $(this).addClass('menu-antrianku-active');
      $('.menu-buat-antrian').removeClass('menu-antrianku-active');
      $('.content-field-pemilik-antrian').hide();
      $('#content-tunggu-antrian').show();
    })
    $('.menu-buat-antrian').click(function(){
      $(this).addClass('menu-antrianku-active');
      $('.menu-pengantri').removeClass('menu-antrianku-active');
      $('#content-tunggu-antrian').hide();
      $('.content-field-pemilik-antrian').show();
    })

    if ($('.menu-pengantri').hasClass('menu-antrianku-active')) {
      $('.content-field-pemilik-antrian').hide();
    }else if ($('.menu-buat-antrian').hasClass('menu-antrianku-active')){
      $('#content-tunggu-antrian').hide();
    }

    $("#panggilAntrean").on("click", () => {
        let id = $("#inputRiwayatAntreanId").val();
        let id_loket = $("#inputLoketId").val();

        // abis nyari lewat ajax ke-2, kalo ga ada record baru tampilkan saja akhir dari antrean

        console.log("id riwayat= " + id);
        console.log("id loket = " + id_loket);
        $("#idRiwayatAntrean111").val(id);
        $("#idLoket").val(id_loket);
        $("#modalKonfirmasiAntrean").modal("show");
    });

    $('#tambahAntreanOffline').on("click", ()=>{
        let id_loket = $("#inputLoketId").val();
        $('#idLoketOffline').val(id_loket);
        $("#modalAntreanOffline").modal("show");
    })

    // window.updateAntrean = function(id, id_loket){
    //   $('#idRiwayatAntrean111').val(id);
    //   $('#idLoket').val(id_loket);

    //   $('#modalKonfirmasiAntrean').modal('show');
    // };

    function ambilAntreanBerikutnya(id_loket) {
        console.log("success 1");
        $.ajax({
            url: "/ambil-antrean-baru/" + id_loket,
            type: "GET",
            success: function (data) {
                console.log(data.id);
                if (data.id) {
                    $("#nomorAntrean").html(data.nomor_antrean);
                } else {
                    $("#nomorAntrean").html("Tidak ada antrean berikutnya");
                }
                $("#idRiwayatAntrean111").val(data.id);
                $("#idRiwayatAntrean111").val(data.id);
                $("#inputRiwayatAntreanId").val(data.id);
                $("#inputLoketId").val(id_loket);
            },
        });
    }

    function majukanAntrean(id, id_loket) {
        $.ajax({
            url: "/perbaharui-antrean",
            type: "PUT",
            data: {
                id: id,
            },
            success: function () {
                ambilAntreanBerikutnya(id_loket);
            },
        });
    }

    

    // function ambilNomorAntrean(id_loket){
    //     $('modal-ambil-nomor')
    // }

    function ambilNomorAntreanOffline(id_loket){
        $.ajax({
            url: "/submit-antrean-offline",
            type: "POST",
            data: {
                id_loket: id_loket,
            },
            success: function() {
                console.log('Sukses');
            },
        });
    }

    $("#formKonfirmasiAntrean").submit(function (event) {
        event.preventDefault();
        let id = $("#idRiwayatAntrean111").val();
        let id_loket = $("#idLoket").val();
        console.log(id);
        console.log("eyoo");
        if (id) {
            majukanAntrean(id, id_loket);
        } else {
            ambilAntreanBerikutnya(id_loket);
        }

        $("#modalKonfirmasiAntrean").modal("hide");
    });

    $("#formAntreanOffline").submit(function (event) {
        event.preventDefault();
        let id_loket = $("#idLoketOffline").val();
        ambilNomorAntreanOffline(id_loket);
        $("#modalAntreanOffline").modal("hide");
    });
});

$(window).ready(function () {
    var wHeight = $(window).height();

    $(".section")
        .height(wHeight)
        .scrollie({
            scrollOffset: -50,
            direction: "both",
            scrollingInView: function (elem, winPos) {
                var bgColor = elem.data("background");
                console.log(bgColor);
                if (bgColor === "#ffff") {
                    $(".navbar").css("background-color", "#FFFFFF");
                    $("#navbar-logo").attr("src", "img/logoAntriedark.png");
                    $(".nav-link").css("color", "#5D5D83");
                } else if (bgColor === "#4DB0FF") {
                    $(".navbar").css("background-color", "#4DB0FF");
                    $("#navbar-logo").attr("src", "img/logoAntrielight.png");
                    $(".nav-link").css("color", "#FFFFFF");
                } else {
                    $(".navbar").css("background-color", "#FFE77A");
                    $("#navbar-logo").attr("src", "img/logoAntriedark.png");
                    $(".nav-link").css("color", "#5D5D83");
                }
                $("body").css("background-color", bgColor);
            },
        });
});

const swiper = new Swiper(".swiper-container", {
    // Optional parameters
    direction: "horizontal",
    loop: true,

    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    // And if we need scrollbar
    scrollbar: {
        el: ".swiper-scrollbar",
    },

    slidesPerView: "auto",
    spaceBetween: 40,
});
