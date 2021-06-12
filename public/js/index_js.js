//carousel or slideshow
$('#carousel_mainpage').carousel({
	interval: 2000
});
//carousel or slideshow

// BootSideMenu customize setting
$( document ).ready(function() {

    $('#slide-nav').BootSideMenu({
        // 'left' or 'right'
        side: "right",
        // animation speed
        duration: 300,
        // restore last menu status on page refresh
        remember: false,
        // auto close
        autoClose: true,
        // push the whole page
        pushBody: true,
        // close on click
        closeOnClick: true,
        // width
        width: "17%",
        // icons
        icons: {
            left: 'glyphicons glyphicon-chevron-left',
            right: 'glyphicons glyphicon-chevron-right',
            down: 'glyphicons glyphicon-chevron-top'
        },
        // 'dracula', 'darkblue', 'zenburn', 'pinklady', 'somebook'
        theme: '',
    });
});
// BootSideMenu customize setting


/*
//jquery nice scroll
$("body").niceScroll();
$("#col9_main").niceScroll();
//jquery nice scroll

window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
*/
