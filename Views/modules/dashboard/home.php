<main id="main-custom">
  <div class="container-fluid"><br>
    <h4 class="home-h4 ml-3"><b>Home</b></h4>
    <p class="home-h4 ml-3">From this modul you can change the home page view</p>
  </div>
  <div class="container-fluid">
    <div class="alert alert-success alert-dismissible  d-none" id="inserthome">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success! -</strong>  Registered Successfully .
    </div>
    <div class="alert alert-primary alert-dismissible  d-none" id="usehomequote">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success! -</strong>  Background Image & Quote Successfully Changed.
    </div>
    <div class="alert alert-primary alert-dismissible  d-none" id="updatehome">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Update! -</strong>  Updated Successfully .
    </div>
    <div class="alert alert-danger alert-dismissible  d-none" id="errorhome">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>*Error! -</strong> All fields are required .
    </div>
    <div class="alert alert-warning alert-dismissible d-none" id="deletehome">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Deleted! -</strong> Deleted Successfully .
    </div>
    <div class="alert alert-danger alert-dismissible d-none" id="lastquote">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>ERROR! -</strong> You can not delete the last Quote.
    </div>
    <div class="row">
      <div class="col-lg-5 col-sm-12 mt-5">
        <h4 class="home-h4-card ml-3">Create new quote and background</h4>
        <div class="card home-card">
          <div class="card-body">
            <div class="form-group d-flex card-body-home">
              <label for="username" class="mt-3 mr-2"><b class="custom-bold">Quote</b></label>
              <input class="form-control costum-input-home ml-5" type="text" id="quote" name="quote" placeholder="Write your quote at last 15 characters">
            </div>
            <div class="form-group d-flex card-body-home custom-file " required>
              <label for="username" class="mt-3 mr-3"><b>Image</b></label>
              <div class="custom-file">
                <input type="file" class="custom-file-input ml-3" id="image" name="image" onchange="ImageHome(event)">
                <label class="custom-file-label costum-input-home" for="inputGroupFile04"><span class="custom-label-image">Background Image</span></label>
              </div>
            </div>
            <div class="row row-responsive" style="margin-left: 100px;margin-bottom: 30px">
              <div class="card mt-3" >
                <div class="card-body">
                  <img src="Views/dist/img/client 4.png" id="output" class="foto col-5 "
                  style=";margin-top: 10px;max-width: 320px; max-height: 200px!important;" />
                </div>
              </div>
            </div>
            <input  class="btn btn-success-custom btn-sm " style="margin-left: 175px;" type="button" id="InsertHome" name="InsertHome" value="Add" onclick="test123()">
          </div>
        </div>
      </div>
      <div class="col-md-7">
        <h4 class="home-h4-card ml-4">List of quotes and background</h4>
        <div class="row custom-row"id="showquotes">

        </div>
      </div>
    </div>
  </div>
</div>
</main>
<script>
ShowHome();
function ShowHome(){
$.ajax({
method: 'POST',
url: "Ajax/homeAJAX.php",
success: function(results) {
$("#showquotes").html(results);
}
});
}
var ImageHome = function(event){
var output = document.getElementById('output');
output.src = URL.createObjectURL(event.target.files[0]);
}
function test123(){
var quote = $('#quote').val();
var files_data = $('#image').prop('files')[0];
var image = $("#image").val();
var form_about = new FormData();
form_about.append('quote', quote);
form_about.append('image', files_data);
form_about.append('image', image);
if(quote !=""&& image !=""){
$.ajax({
url: 'Ajax/homeAJAX.php',
cache: false,
contentType: false,
processData: false,
data: form_about,
quote: quote,
image: image,
dataType:"text",
type: 'post',
success: function(results){
var access = $('#quote').val("");
$("#inserthome").removeClass("d-none");
$("#errorhome").addClass("d-none");
$("#updatehome").addClass("d-none");
$("#deletehome").addClass("d-none");
$("#usehomequote").addClass("d-none");
$("#lastquote").addClass("d-none");
ShowHome();
}
});
}else{
$("#errorhome").removeClass("d-none");
$("#inserthome").addClass("d-none");
$("#updatehome").addClass("d-none");
$("#deletehome").addClass("d-none");
$("#usehomequote").addClass("d-none");
$("#lastquote").addClass("d-none");
}
}
function deletequote(deleteidquote){
var deleteidquote = deleteidquote;
$.ajax({
type: 'GET',
url: 'Ajax/homeAJAX.php',
data: {
'deleteidquote': deleteidquote
},
success: function(results) {
$("#inserthome").addClass("d-none");
$("#errorhome").addClass("d-none");
$("#usehomequote").addClass("d-none");
$("#deletehome").removeClass("d-none");
$("#updatehome").addClass("d-none");
$("#lastquote").addClass("d-none");
ShowHome();
}
});
}
function usethis(idhome){
var idhome = idhome;
var form_data = new FormData();
form_data.append('idhome', idhome);
$.ajax({
url: "Ajax/homeAJAX.php",
type: "POST",
data: form_data,
contentType: false,
processData: false,
cache:false,
dataType: "text",
success: function(results){
$("#inserthome").addClass("d-none");
$("#errorhome").addClass("d-none");
$("#deletehome").addClass("d-none");
$("#usehomequote").removeClass("d-none");
$("#lastquote").addClass("d-none");
}
});
}
function deletehome(){
$("#lastquote").removeClass("d-none");
$("#inserthome").addClass("d-none");
$("#errorhome").addClass("d-none");
$("#deletehome").addClass("d-none");
$("#usehomequote").addClass("d-none");
}
</script>