<?php 
$attributes = $_SESSION['attributes'];
$arrayAutorizim = explode(" ",$attributes); 
foreach($arrayAutorizim as $row1){ 
if(strpos($row1,"users")!==false) { 
?>
<main>

  <div class="container-fluid"><br>
    <h4 class="home-h4 ml-3"><b>Users</b></h4>
    <p class="home-h4 ml-3">From this modul you can add edit users for this platform</p>
  </div>
  <div class="container-fluid">
    <div class="alert alert-success alert-dismissible  d-none" id="insertusers">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Success! -</strong>  Registered Successfully .
    </div>
    <div class="alert alert-primary alert-dismissible  d-none" id="updateusers">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Update! -</strong>  Updated Successfully .
    </div>
    <div class="alert alert-danger alert-dismissible  d-none" id="errorusers">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>*Error! -</strong> All fields are required .
    </div>
    <div class="alert alert-danger alert-dismissible  d-none" id="errordelete">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>*Error! -</strong>You cant delete the last user  .
    </div>
    <div class="alert alert-warning alert-dismissible d-none" id="deleteusers">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>Deleted! -</strong> Deleted Successfully .
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
        <h4 class="home-h4-card ml-3">Add new user</h4>
        <div class="card home-card">
          <div class="card-body">                                  <?php
            $len = 10;   // komplet numrat
            $min = 11;  // minimumi
            $max = 100;  // maximumi
            $range = []; // inicializimi i arres
            foreach (range(0, $len - 1) as $i) {
              while(in_array($num = mt_rand($min, $max), $range));
              $range[] = $num;
              $a = implode('', $range);
            }
            ?>
            <input type="text" name="count" id="count" value="<?php echo $a;?>" class="d-none" >
            <div class="form-group d-flex card-body-home">
              <label for="name" class="mt-3 mr-4"><b>Name</b></label>
              <input class="form-control costum-input-home" type="text" id="name" name="name" placeholder="Name">
            </div>
            <div class="form-group d-flex card-body-home">
              <label for="surname" class="mt-3"><b>Surname</b></label>
              <input class="form-control costum-input-home custom-responsive-user-surname" type="text" name="surname" id="surname" placeholder="Surname">
            </div>
            <div class="form-group d-flex card-body-home">
              <label for="surname" class="mt-3"><b>Password</b></label>
              <input class="form-control costum-input-home custom-responsive-user-surname" type="password" name="password" id="password" placeholder="Surname">
            </div>
            <div class="form-group d-flex card-body-home">
              <label for=""><b>Attributes</b></label>
              <div class="form-group card-body-home custom-checkbox" >
                <div class="form-group ml-5 mt-2">

                  <input type="checkbox"  class="chk custom-control-input" value="Service" id="Service1" />
                  <label class="custom-control-label" for="Service1">Service</label>
                </div>
                <div class="form-group ml-5">
                  <input type="checkbox"  class="chk custom-control-input" value="AboutUs" id="AboutUs1"/>
                  <label class="custom-control-label" for="AboutUs1">About Us</label>
                </div>
                <div class="form-group ml-5">
                  <input type="checkbox"  class="chk custom-control-input" value="Clients" id="Clients1"/>
                  <label class="custom-control-label" for="Clients1">Clients</label>
                </div>
                <div class="form-group ml-5">
                  <input type="checkbox"  class="chk custom-control-input" value="Contact" id="Contact1"/>
                  <label class="custom-control-label" for="Contact1">Contact</label>
                </div>
                <div class="form-group ml-5">
                  <input type="checkbox"  class="chk custom-control-input" value="Appointments" id="Appointments1"/>
                  <label class="custom-control-label" for="Appointments1">Appointments</label>
                </div>
                <div class="form-group ml-5">
                  <input type="checkbox"  class="chk custom-control-input" value="users" id="users1"/>
                  <label class="custom-control-label" for="users1">Users</label>
                </div>
              </div>
            </div>
            <div class="form-group d-flex card-body-home">
              <div class="form-group d-flex card-body-home custom-file " required>
                <label for="username" class="mt-3 mr-3"><b>Image</b></label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input ml-3" id="image" name="image" onchange="Usersimg(event)">
                  <label class="custom-file-label costum-input-home" for="inputGroupFile04"><span class="custom-label-image">Background Image</span></label>
                </div>
              </div>
            </div>
            <div class="row text-center" style="margin-bottom:30px;">
              <div class="card-body">
                <img src="Views/dist/img/user.png" id="output6" class="foto img-radius  col-4 img-custom-back" id="image" name="image"/>
              </div>
            </div>
            <button class="btn btn-success-custom-service btn-sm float-right mt-4" type="button" onclick="InsertUser()">Add</button>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
        <h4 class="home-h4-card ml-4">List of you'r users</h4>
        <div class="card home-card ml-1">
          <div class="card-body table-responsiv e">
            <table class="table table-striped text-nowrap card-body-home" id="myTables">
              <thead class="thead custom-table-head">
                <tr class="custom-tr-table text-center">
                  <th scope="col" class="w-25">Name Surname</th>
                  <th scope="col" class="w-25">Password </th>
                  <th scope="col" class="w-25">Atributes</th>
                  <th scope="col" class="w-25">Images</th>
                  <th scope="col" class="w-25">OPTIONS</th>
                </tr>
              </thead>
              <tbody class="custom-table-body" id="showusers">
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->
      <!-- Modal -->
      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" >
              <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                <div class="alert alert-danger alert-dismissible d-none" id="errorusers">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>*Error! -</strong>At least one attribute is required .
                </div>
                <div class="card home-card">
                  <div class="card-body">
                    <input type="text" name="editiduser" id="editiduser" class="d-none">
                    <div class="form-group d-flex card-body-home">
                      <label for="name" class="mt-3"><b>Name</b></label>
                      <input class="form-control costum-input-home ml-5" type="text" id="editname" name="editname" placeholder="Name">
                    </div>
                    <div class="form-group d-flex card-body-home">
                      <label for="surname" class="mt-3"><b>Surname</b></label>
                      <input class="form-control costum-input-home ml-4 custom-responsive-user-surname" type="text" name="editsurname" id="editsurname" placeholder="Surname">
                    </div>
                    <div class="form-group d-flex card-body-home">
                      <label for="surname" class="mt-3"><b>password</b></label>
                      <input class="form-control costum-input-home ml-4 custom-responsive-user-surname" type="password" name="editpassword" id="editpassword" placeholder="Password">
                    </div>
                    <!-- <div class="form-group d-flex card-body-home">
                      <label for="">Attributes</label>
                      <div class="form-group col-sm-11 mt-5" >
                        <input type="checkbox"  class="chke" value="Service"      id="Service" />Service
                        <input type="checkbox"  class="chke" value="AboutUs"      id="AboutUs"/>About Us
                        <input type="checkbox"  class="chke" value="Clients"      id="Clients"/>Clients<br />
                        <input type="checkbox"  class="chke" value="Contact"      id="Contact"/>Contact
                        <input type="checkbox"  class="chke" value="Appointments" id="Appointments"/>Appointments
                        <input type="checkbox"  class="chke" value="users"        id="users"/>users<br />
                      </div>
                    </div> -->

<div class="form-group d-flex card-body-home">
              <label for=""><b>Attributes</b></label>
              <div class="form-group card-body-home custom-checkbox" >
                <div class="form-group ml-4">
                  <input type="checkbox"  class="chke custom-control-input" value="Service"      id="Service" />
                  <label class="custom-control-label" for="Service">Service</label>
                </div>
                <div class="form-group ml-4">
                  <input type="checkbox"  class="chke custom-control-input" value="AboutUs"      id="AboutUs"/>
                  <label class="custom-control-label" for="AboutUs">About Us</label>
                </div>
                <div class="form-group ml-4">
                  <input type="checkbox"  class="chke custom-control-input" value="Clients"      id="Clients"/>
                  <label class="custom-control-label" for="Clients">Clients</label>
                </div>
                <div class="form-group ml-4">
                  <input type="checkbox"  class="chke custom-control-input" value="Contact"      id="Contact"/>
                  <label class="custom-control-label" for="Contact">Contact</label>
                </div>
                <div class="form-group ml-4">
                  <input type="checkbox"  class="chke custom-control-input" value="Appointments" id="Appointments"/>
                  <label class="custom-control-label" for="Appointments">Appointments</label>
                </div>
                <div class="form-group ml-4">
                  <input type="checkbox"  class="chke custom-control-input" value="users"        id="users"/>
                  <label class="custom-control-label" for="users">Users</label>
                </div>
              </div>
            </div>

                    <div class="form-group d-flex card-body-home">
                      <div class="form-group d-flex card-body-home custom-file " required>
                        <label for="username" class="mt-3 mr-3"><b>Image</b></label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input ml-3" id="editimage" name="editimage" onchange="Updateimg(event)">
                          <label class="custom-file-label costum-input-home" for="inputGroupFile04"><span class="custom-label-image">Background Image</span></label>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row text-center" style="margin-bottom:30px;">
                      <div class="card-body">
                        <img src="Views/dist/img/user.png" id="output4" class="foto img-radius col-4 img-custom-back" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="updateusers()">Save changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
$(document).ready( function () {
$('#myTables').DataTable();
} );
showusers();
function showusers(){
$.ajax({
method: 'POST',
url: "Ajax/usersAJAX.php",
success: function(results) {
$("#showusers").html(results);
}
});
}
var Usersimg = function(event){
var output6 = document.getElementById('output6');
output6.src = URL.createObjectURL(event.target.files[0]);
}
var Updateimg = function(event){
var output4 = document.getElementById('output4');
output4.src = URL.createObjectURL(event.target.files[0]);
}
function InsertUser(){
var name            =   $("#name").val();
var surname         =   $("#surname").val();
var count           =   $("#count").val();
var password        =   $("#password").val();
var files_data      =   $('#image').prop('files')[0];
var image           =   $("#image").val();
// Declare a checkbox array
var chkArray = [];
// Look for all checkboxes that have a specific class and was checked
$(".chk:checked").each(function() {
chkArray.push($(this).val());
});
// Join the array separated by the comma
var selected;
selected = chkArray.join(',') ;
var form_about    =   new FormData();
form_about.append("selected", JSON.stringify(selected));
form_about.append('name', name);
form_about.append('surname', surname);
form_about.append('count', count);
form_about.append('password', password);
form_about.append('image', files_data);
form_about.append('image', image);
if(name !="" && image !=""){
$.ajax({
url: 'Ajax/usersAJAX.php',
cache: false,
contentType: false,
processData: false,
data: form_about,
name: name,
surname: surname,
count: count,
password: password,
selected: selected,
image: image,
dataType:"text",
type: 'post',
success: function(results){
console.log(results);
$("#insertusers").removeClass("d-none");
$("#errorusers").addClass("d-none");
$("#deleteusers").addClass("d-none");
$("#updateusers").addClass("d-none");
showusers();
}
});
}else{
$("#insertusers").addClass("d-none");
$("#errorusers").removeClass("d-none");
$("#deleteusers").addClass("d-none");
$("#updateusers").addClass("d-none");
}
}
function deleteuser(iduser){
var iduser = iduser;
$.ajax({
type: 'GET',
url: 'Ajax/usersAJAX.php',
data: {
'iduser': iduser
},
success: function(results) {
$("#insertusers").addClass("d-none");
$("#errorusers").addClass("d-none");
$("#deleteusers").removeClass("d-none");
$("#updateusers").addClass("d-none");
showusers();
}
});
}
function editusers(editidusers){
var editidusers = editidusers;
data = new FormData();
data.append("editidusers", editidusers);
$.ajax({
url: 'Ajax/edits.php',
method: "POST",
data: data,
editidusers:editidusers,
cache: false,
contentType: false,
processData: false,
dataType:"json",
success: function(results) {
$("#editiduser").val(results["iduser"]);
$("#editname").val(results["name"]);
$("#editsurname").val(results["surname"]);
$("#editpassword").val(atob(results["password"]));
$("#editimage").val(results["image"]);
var atributi = results["attributes"];
checked=false
if(atributi.indexOf('Service') > 0){
$('#Service').each(function() {
this.checked = true;
});
}else{
$('#Service').each(function() {
this.checked = false;
});
}
if(atributi.indexOf('AboutUs') > 0){
$('#AboutUs').each(function() {
this.checked = true;
});
}else{
$('#AboutUs').each(function() {
this.checked = false;
});
}
if(atributi.indexOf('Clients') > 0){
$('#Clients').each(function() {
this.checked = true;
});
}else{
$('#Clients').each(function() {
this.checked = false;
});
}
if(atributi.indexOf('Contact') > 0){
$('#Contact').each(function() {
this.checked = true;
});
}else{
$('#Contact').each(function() {
this.checked = false;
});
}
if(atributi.indexOf('Appointments') > 0){
$('#Appointments').each(function() {
this.checked = true;
});
}else{
$('#Appointments').each(function() {
this.checked = false;
});
}
if(atributi.indexOf('users') > 0){
$('#users').each(function() {
this.checked = true;
});
}else{
$('#users').each(function() {
this.checked = false;
});
}
}
});
}
function updateusers(){
// Declare a checkbox array
var chkeArray = [];
// Look for all checkboxes that have a specific class and was checked
$(".chke:checked").each(function() {
chkeArray.push($(this).val());
});
// Join the array separated by the comma
var selected2;
selected2 = chkeArray.join(',') ;
var editidusers       =   $('#editiduser').val();
var editname        =   $('#editname').val();
var editsurname       =   $('#editsurname').val();
var editpassword     =   $('#editpassword').val();
var editimage         =   $("#editimage").val();
var files_data      =   $('#editimage').prop('files')[0];
var form_data = new FormData();
form_data.append('editiduser'  ,  editidusers);
form_data.append('editname'    ,  editname);
form_data.append('editsurname' ,  editsurname);
form_data.append('editpassword',  editpassword);
form_data.append("selected2"   , JSON.stringify(selected2));
form_data.append('editimage'   ,  editimage);
form_data.append('editimage'   ,  files_data);
$.ajax({
url: "Ajax/usersAJAX.php",
type: "POST",
data: form_data,
selected2: selected2,
contentType: false,
processData: false,
cache:false,
dataType: "text",
success: function(results){
console.log(results);
$("#insertusers").addClass("d-none");
$("#errorusers").addClass("d-none");
$("#deleteusers").addClass("d-none");
$("#updateusers").removeClass("d-none");
$("#exampleModalLong").modal("hide");
showusers();
}
});
}
</script>
<?php  
  
}else{
 echo "<script>window.location.href='home'</script>";

  } 
} ?>