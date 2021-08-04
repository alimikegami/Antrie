$(document).ready(function() {
	$('#fullpage').fullpage({
		//options here
		autoScrolling:true,
        controlArrows: true,
        navigation: true,
        slidesNavigation: true,
        scrollOverflow: true,
        afterLoad: function(origin, destination, direction) {
            if (destination.index === 0 || destination.index === 2 || destination.index === 4) {
                $('.navbar').css('background-color', '#FFFFFF');
                $('#navbar-logo').attr('src', 'img/logoAntriedark.png');
                $('.nav-link').css('color', '#5D5D83');
            }else if (destination.index === 3){
                $('.navbar').css('background-color', '#FFE77A');
                $('#navbar-logo').attr('src', 'img/logoAntriedark.png');
                $('.nav-link').css('color', '#5D5D83');
            }else {
                $('.navbar').css('background-color', '#4DB0FF');
                $('#navbar-logo').attr('src', 'img/logoAntrielight.png');
                $('.nav-link').css('color', '#FFFFFF');
            }
           
          },
	});

    // homepage kelebihan pengantre dan pembuat antrean
    $('#kelebihan-pembuat-antrean').on('click', ()=>{
        $('.word-pembuat-antrean ul').slideToggle();
        $('.fas').toggleClass('fa-plus fa-minus');
    });

    $('#kelebihan-pengantre').on('click', ()=>{
        $('.word-pengantre ul').slideToggle();
        $('.fas').toggleClass('fa-plus fa-minus');
    });

    // card flip homepage
    $('.kemudahan-kenapa-pilih').flip();
    $('.kecepatan-kenapa-pilih').flip();
    $('.fleksibilitas-kenapa-pilih').flip();
    
});
