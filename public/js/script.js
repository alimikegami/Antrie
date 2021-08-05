$(document).ready(function() {

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
    
});

$( window ).ready(function() {

    var wHeight = $(window).height();

    $('.section')
      .height(wHeight)
      .scrollie({
        scrollOffset : -50,
        scrollingInView : function(elem, winPos) {
                   
          var bgColor = elem.data('background');
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

