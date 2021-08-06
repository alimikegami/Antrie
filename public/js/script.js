$(document).ready(function() {
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

    $('#tombol-filter').on('click', ()=>{
      $('#exampleModal').modal('toggle');
    })

});

$( window ).ready(function() {

    var wHeight = $(window).height();

    $('.section')
      .height(wHeight)
      .scrollie({
        scrollOffset : -50,
        direction : 'both',
        scrollingInView : function(elem, winPos) {
                   
          var bgColor = elem.data('background');
          console.log(bgColor)
          if (bgColor === '#ffff') {
                $('.navbar').css('background-color', '#FFFFFF');
                $('#navbar-logo').attr('src', 'img/logoAntriedark.png');
                $('.nav-link').css('color', '#5D5D83');
            }else if (bgColor === '#4DB0FF'){
                $('.navbar').css('background-color', '#4DB0FF');
                $('#navbar-logo').attr('src', 'img/logoAntrielight.png');
                $('.nav-link').css('color', '#FFFFFF');
            }else {
                $('.navbar').css('background-color', '#FFE77A');
                $('#navbar-logo').attr('src', 'img/logoAntriedark.png');
                $('.nav-link').css('color', '#5D5D83');
            }
          $('body').css('background-color', bgColor);
          
        }
      });

  });

  const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
    loop: true,
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },

    slidesPerView: 'auto',
    spaceBetween: 40,
  });