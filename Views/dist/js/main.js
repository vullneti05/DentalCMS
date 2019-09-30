  $(document).ready( function () {
    $('#myTables').DataTable();
} );


// Active navbar
var selector = '.navbar .nav-item';
$(selector).on('click', function(){
$(selector).removeClass('active');
$(this).addClass('active');
});

// $("#sidebar-wrapper .list-group-item").each(function() {
//    if ((window.location.pathname.indexOf($(this).attr('href'))) > -1) {
//        $(this).addClass('active');
//    }
// });

// Init scrollspy
$('body').scrollspy({target:'#main-nav,.custom-button-schedule a,.service .custom-button-card-service a, .navbar-footer,a.go-top'});
$("#main-nav a,.custom-button-schedule a,.service .custom-button-card-service a,a.go-top, .navbar-footer a").on('click', function (event) {
if (this.hash !== "") {
event.preventDefault();
const hash = this.hash;
$('html, body').animate({
scrollTop: $(hash).offset().top
},1300, function () {
window.location.hash = hash;
});
}
});
// Place Location

  function initMap() {
      // The location of Uluru
      var uluru = {
          lat: 42.362764,
          lng: 21.161337
      };
      // The map, centered at Uluru
      var map = new google.maps.Map(
          document.getElementById('map'), {
              zoom: 12,
              center: uluru
          });
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({
          position: uluru,
          map: map
      });
  }
// Toggle
$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
});
// Popove
function test(){
$('[data-toggle="popover"]').popover({
trigger: 'focus'
})
}