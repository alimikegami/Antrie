$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".keterangan-loket-pemilik button").click(function (e) {
        e.preventDefault();
        let id_element = $(this).attr('id');
        if (id_element.includes("tombol-tutup-loket-")) {
            let id_loket = $(this).attr('data-id-loket')
            $('#id_loket_tutup').val(id_loket);
            $('#modal-konfirmasi-tutup-loket').modal('show');
        } else if (id_element.includes("tombol-buka-loket-")) {
            let id_loket = $(this).attr('data-id-loket')
            $('#id_loket_buka').val(id_loket);
            $('#modal-konfirmasi-buka-loket').modal('show');
        }
    });

    $(".keterangan-loket-riwayat button").click(function (e) {
        e.preventDefault();
        let id_element = $(this).attr('id');
        if (id_element.includes("tombol-ambil-batal-antrian-")) {
            let id_riwayat = $(this).attr('data-riwayat');
            $('#id-riwayat').val(id_riwayat);
            $('#modal-konfirmasi-batalkan-antrean').modal('show');
        }
    });

    // Navbar page selector [REFACTOR!!!!]
    $(function () {
        $('a').each(function () {
            if ($(this).prop('href') == window.location.href) {
                $(this).parents('.menu').addClass('selected');
                console.log($(this).parents(".menu"));
            }
        });
    });

    let sidenav_btn = document.querySelector("#sidenav_btn");
    let sidebar_btn = document.querySelector("#sidebar_btn");
    let sidebar = document.querySelector("#navbar-responsive");

    sidenav_btn.onclick = function() {
        sidebar.classList.toggle("active");
        sidebar.style.visibility = "visible";
    }
    sidebar_btn.onclick = function() {
        sidebar.classList.toggle("active");
        sidebar.style.visibility = "hidden";
    }

    // homepage kelebihan pengantre dan pembuat antrean
    $('#kelebihan-pembuat-antrean').on('click', () => {
        $('.word-pembuat-antrean ul').slideToggle();
        $('#tambah-pembuat-antrean').toggleClass('fa-plus fa-minus');
    });

    $('#kelebihan-pengantre').on('click', () => {
        $('.word-pengantre ul').slideToggle();
        $('#tambah-pengantre').toggleClass('fa-plus fa-minus');
    });

    // card flip homepage
    $('.kemudahan-kenapa-pilih').flip();
    $('.kecepatan-kenapa-pilih').flip();
    $('.fleksibilitas-kenapa-pilih').flip();


    // menu pengguna
    $('.menu-dashboard').on('click', function () {
        window.location.href = '/beranda';
        $('.menu').removeClass('selected');
        $(this).addClass('selected');
    });
    $('.menu-antrian').on('click', function () {
        window.location.href = '/antreanku';
        $('.menu').removeClass('selected');
        $(this).addClass('selected');
    });
    $('.menu-pesan').on('click', function () {
        $('.menu').removeClass('selected');
        $(this).addClass('selected');
    });
    $('.menu-profil').on('click', function () {
        $('.menu').removeClass('selected');
        $(this).addClass('selected');
    });

    // tombol ambil antrian di klik
    $('.content-field-lokasi #tombol-ambil-antrian').click(() => {
        $('#modal-ambil-nomor').modal('show');
    })

    // tombol menu halaman antreanku
    $('.menu-pengantri').click(function () {
        $(this).addClass('menu-antrianku-active');
        $('.menu-buat-antrian').removeClass('menu-antrianku-active');
        $('.content-field-pemilik-antrian').hide();
        $('#content-tunggu-antrian').show();
    })
    $('.menu-buat-antrian').click(function () {
        $(this).addClass('menu-antrianku-active');
        $('.menu-pengantri').removeClass('menu-antrianku-active');
        $('#content-tunggu-antrian').hide();
        $('.content-field-pemilik-antrian').show();
    })

    if ($('.menu-pengantri').hasClass('menu-antrianku-active')) {
        $('.content-field-pemilik-antrian').hide();
    } else if ($('.menu-buat-antrian').hasClass('menu-antrianku-active')) {
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

    $('#tambahAntreanOffline').on("click", () => {
        let id_loket = $("#inputLoketId").val();
        $('#idLoketOffline').val(id_loket);
        $("#modalAntreanOffline").modal("show");
    });

    // animasi icon di halaman antrianku.pemilik antrian
    $('.content-field-lokasi').on('mouseenter', '#content-pemilik-antrian', function () {
        $(this).children('.lokasi-wrapper').children('#right-arrow').css('font-size', '3.5rem');
    }).on('mouseleave', '#content-pemilik-antrian', function () {
        $(this).children('.lokasi-wrapper').children('#right-arrow').css('font-size', '3rem');
    }).on('click', '#content-pemilik-antrian', function () {
        $(this).children('.lokasi-wrapper').children('#right-arrow').css('font-size', '3.5rem');
    });

    // to enable popovers Bootstrap
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    });

    // tambah loket ditekan
    $('.tambah-loket').click(() => {
        if ($('.loket-dua').hasClass('d-none')) {
            $('.loket-dua').removeClass('d-none');
            location.href = '#loket-dua';
        } else if ($('.loket-tiga').hasClass('d-none')) {
            $('.loket-tiga').removeClass('d-none');
            location.href = '#loket-tiga';
        } else if ($('.loket-empat').hasClass('d-none')) {
            $('.loket-empat').removeClass('d-none');
            location.href = '#loket-empat';
        } else if ($('.loket-lima').hasClass('d-none')) {
            $('.loket-lima').removeClass('d-none');
            location.href = '#loket-lima';
            $('.tambah-loket').addClass('d-none');
        }
    });

    // tombol silang di informasi loket ditekan
    $('.btn-close').on('click', function () {
        var id_btn_close = $(this).attr('id');

        if ($('.tambah-loket').hasClass('d-none')) {
            $('.tambah-loket').removeClass('d-none');
        }

        switch (id_btn_close) {
            case 'btn-close-2':
                $('.loket-dua').animate({
                    height: 0,
                }, 300, function () {

                    // $(this).remove();
                    $(this).find(':input').val('');
                    $(this).addClass('d-none');
                    $(this).css('height', '100%');
                });
                break;
            case 'btn-close-3':
                $('.loket-tiga').animate({
                    height: 0,
                }, 300, function () {
                    $(this).find(':input').val('');
                    $(this).addClass('d-none');
                    $(this).css('height', '100%');
                });
                break;
            case 'btn-close-4':
                $('.loket-empat').animate({
                    height: 0,
                }, 300, function () {
                    $(this).find(':input').val('');
                    $(this).addClass('d-none');
                    $(this).css('height', '100%');
                });
                break;
            case 'btn-close-5':
                $('.loket-lima').animate({
                    height: 0,
                }, 300, function () {
                    $(this).find(':input').val('');
                    $(this).addClass('d-none');
                    $(this).css('height', '100%');
                });
                break;

            default:
                break;
        }
    });

    // window.updateAntrean = function(id, id_loket){
    //   $('#idRiwayatAntrean111').val(id);
    //   $('#idLoket').val(id_loket);

    //   $('#modalKonfirmasiAntrean').modal('show');
    // };

    function ambilAntreanBerikutnya(id_loket) {
        var nomor = $('#nomorAntrean').text();
        $.ajax({
            url: "/ambil-antrean-baru/" + id_loket,
            type: "GET",
            beforeSend: function () {
                $('#nomorAntrean').hide();
                $('#spinner').show();
            },
            complete: function () {
                console.log('complete');
                $('#spinner').hide();
                $('#nomorAntrean').show();
            },
            success: function (data) {
                console.log(data.id);
                if (data.id) {
                    $("#nomorAntrean").html(data.nomor_antrean);
                } else {
                    $("#nomorAntrean").html(nomor);
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

    function ambilNomorAntreanOffline(id_loket) {
        $.ajax({
            url: "/submit-antrean-offline",
            type: "POST",
            data: {
                id_loket: id_loket,
            },
            success: function (data) {
                $("#nomor-antrean").html(data.nomor_antrean);
                $("#modalNomorAntrean").modal("show");
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
        $("#modalAntreanOffline").modal("hide");
        ambilNomorAntreanOffline(id_loket);
    });

    // scroll to top button
    $('.scroll-top').click(function () {
        $(window).scrollTop(0);
        return false;
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() > 300) {
            $('.scroll-top').addClass('show');
        } else {
            $('.scroll-top').removeClass('show');
        }
    });
});

// landing page scroll animation
$(window).ready(function () {
    var wHeight = $(window).height();

    $(".section")
        .height(wHeight)
        .scrollie({
            scrollOffset: -50,
            direction: "both",
            scrollingInView: function (elem, winPos) {
                var bgColor = elem.data("background");
                if (bgColor === "#ffff") {
                    $(".navbar").css("background-color", "#FFFFFF");
                    $("#navbar-logo").attr("src", "img/logoAntriedark.png");
                    $(".nav-link").css("color", "#5D5D83");
                    $('.scroll-top').addClass("dark");
                } else if (bgColor === "#4DB0FF") {
                    $(".navbar").css("background-color", "#4DB0FF");
                    $("#navbar-logo").attr("src", "img/logoAntrielight.png");
                    $(".nav-link").css("color", "#FFFFFF");
                    $('.scroll-top').removeClass("dark");
                } else {
                    $(".navbar").css("background-color", "#2F2D65");
                    $("#navbar-logo").attr("src", "img/logoAntrielight.png");
                    $(".nav-link").css("color", "#FFFFFF");
                    $('.scroll-top').removeClass("dark");
                }
                $("body").css("background-color", bgColor);
            },
        });
});

const swiper = new Swiper(".swiper", {
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
