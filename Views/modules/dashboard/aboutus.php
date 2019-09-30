<?php
$attributes = $_SESSION['attributes'];
$arrayAutorizim = explode(" ",$attributes);
foreach($arrayAutorizim as $row1){
  if(strpos($row1,"AboutUs")!==false) {
    ?>
    <main>
      <div class="container-fluid"><br>
        <h4 class="home-h4 ml-3"><b>About us</b></h4>
        <p class="home-h4 ml-3">Form this modul you can change add edit your staff</p>
      </div>
      <div class="container-fluid">
        <div class="alert alert-success alert-dismissible  d-none" id="insertabout">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success! -</strong>  Registered Successfully .
        </div>
        <div class="alert alert-primary alert-dismissible  d-none" id="updateabout">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Update! -</strong>  Updated Successfully .
        </div>
        <div class="alert alert-danger alert-dismissible  d-none" id="errorabout">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>*Error! -</strong> All fields are required .
        </div>
        <div class="alert alert-warning alert-dismissible d-none" id="deleteabout">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Deleted! -</strong> Deleted Successfully .
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
            <h4 class="home-h4-card ml-3">Add new staff</h4>
            <div class="card home-card">
              <div class="card-body">
                <div class="form-group d-flex card-body-home">
                  <label for="username" class="mt-3"><b>Name</b></label>
                  <input class="form-control costum-input-home ml-5 custom-responsive-name" type="text" id="name" name="name" placeholder="name">
                </div>
                <div class="form-group d-flex card-body-home">
                  <label for="username" class="mt-3"><b>Surname</b></label>
                  <input class="form-control costum-input-home ml-4 custom-responsive-surname" type="text" id="surname" name="surname" placeholder="Surname">
                </div>
                <div class="form-group d-flex card-body-home">
                  <label for="username" class="mt-3"><b>Tittle</b></label>
                  <input class="form-control costum-input-home ml-5" type="text" id="title" name="title" placeholder="Eg.Specialist">
                </div>
                <div class="form-group d-flex card-body-home">
                  <label for="exampleFormControlTextarea2"><b>Desc</b></label>
                  <textarea class="form-control card-body-textarea rounded-0 ml-5" id="description" name="description" rows="3" placeholder=" Description"></textarea>
                </div>
                <div class="form-group d-flex card-body-home custom-file " required>
                  <label for="username" class="mt-3 mr-3"><b>Image</b></label>
                  <div class="custom-file">
                    <input type="file" class="custom-file-input ml-3" id="image" name="image" onchange="Aboutusimg(event)">
                    <label class="custom-file-label costum-input-home" for="inputGroupFile04"><span class="custom-label-image">Background Image</span></label>
                  </div>
                </div>
                <div class="row text-center" style="margin-bottom:30px;">
                  <div class="card-body">
                    <img src="Views/dist/img/user.png" id="output2" class="col-4 img-custom-back img-radius" width="100">
                  </div>
                </div>
                <button class="btn btn-success-custom-service btn-sm float-right mt-4" type="button" onclick="InsertAbout();">Add</button>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
            <h4 class="home-h4-card ml-4">List of your staff</h4>
            <div class="card home-card ml-1">
              <div class="card-body table-responsive">
                <table class="table table-striped text-nowrap card-body-home" id="myTables">
                  <thead class="thead custom-table-head">
                    <tr class="custom-tr-table text-center">
                      <th scope="col" class="w-25">Name </th>
                      <th scope="col" class="w-25">Surname </th>
                      <th scope="col" class="w-25">TITLE</th>
                      <th scope="col" class="w-25">Description</th>
                      <th scope="col" class="w-25">Image</th>
                      <th scope="col" class="w-25">OPTIONS</th>
                    </tr>
                  </thead>
                  <tbody class="custom-table-body" id="showabout">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Button trigger modal -->
          <!-- Modal -->
          <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Info</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="card-body">
                    <div class="form-group d-flex card-body-home">
                      <input type="text" name="aboutid" id="aboutid" class="d-none">
                      <label for="username" class="mt-3"><b>Name</b></label>
                      <input class="form-control costum-input-home ml-5 custom-responsive-name" type="text" id="editname" name="editname" placeholder="name">
                    </div>
                    <div class="form-group d-flex card-body-home">
                      <label for="username" class="mt-3"><b>Surname</b></label>
                      <input class="form-control costum-input-home ml-4 custom-responsive-surname custom-responsive-surname-aboutus" type="text" id="editsurname" name="editsurname" placeholder="Surname">
                    </div>
                    <div class="form-group d-flex card-body-home">
                      <label for="username" class="mt-3"><b>Tittle</b></label>
                      <input class="form-control costum-input-home ml-5" type="text" id="edittitle" name="edittitle" placeholder="Eg.Specialist">
                    </div>
                    <div class="form-group d-flex card-body-home">
                      <label for="exampleFormControlTextarea2"><b>Desc</b></label>
                  <textarea class="form-control card-body-textarea rounded-0 ml-5" id="editdescription" name="editdescription" rows="3"></textarea>
                    </div>
                    <div class=" custom-file" >
                      <input type="file" id="editimage" name="editimage" class="custom-file-input  form-control "  onchange="Aboutusimgedit(event)" >
                      <label for="image" class="costum-input-home ml-4 custom-file-label col-form-label">
                        <span class="custom-label-image">Background Image</span>
                      </label>
                    </div>
                    <div class="text-center" style="margin-bottom:30px;margin-top: 30px;">
                      <div class="card-body">
                        <img src="Views/dist/img/user.png" id="output3" class="foto img-radius img-custom-back col-4 imgtable" />
                      </div>
                    </div>
                    <input type="hidden" id="editimage" name="editimage" class="is imgtable"  >
                  </div>
                </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="updateabout()">Save changes</button>
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
  });
  showabout();
  function showabout(){
    $.ajax({
      method: 'POST',
      url: "Ajax/aboutusAJAX.php",
      success: function(results) {
        $("#showabout").html(results);
      }
    });
  }
  var Aboutusimg = function(event){
    var output = document.getElementById('output2');
    output.src = URL.createObjectURL(event.target.files[0]);
  }
  var Aboutusimgedit = function(event){
    var output3 = document.getElementById('output3');
    output3.src = URL.createObjectURL(event.target.files[0]);
  }
  function InsertAbout(){
    var name        = $('#name').val();
    var surname     = $('#surname').val();
    var title       = $('#title').val();
    var description = $('#description').val();
    var files_data  = $('#image').prop('files')[0];
    var image       = $("#image").val();
    var form_about = new FormData();
    form_about.append('name', name);
    form_about.append('surname', surname);
    form_about.append('title', title);
    form_about.append('description', description);
    form_about.append('image', files_data);
    form_about.append('image', image);
    if(name !="" && surname !="" && image!=""){
      $.ajax({
        url: 'Ajax/aboutusAJAX.php',
        cache: false,
        contentType: false,
        processData: false,
        data: form_about,
        name: name,
        surname: surname,
        title: title,
        description: description,
        image: image,
        dataType:"text",
        type: 'post',
        success: function(results){

          var name = $('#name').val("");
          var surname = $('#surname').val("");
          var description = $('#description').val("");
          var title = $('#title').val("");

          $("#insertabout").removeClass("d-none");
          $("#errorabout").addClass("d-none");
          $("#deleteabout").addClass("d-none");
          $("#updateabout").addClass("d-none");

          showabout();
        }
      });
    }else{
      $("#insertabout").addClass("d-none");
      $("#errorabout").removeClass("d-none");
      $("#deleteabout").addClass("d-none");
      $("#updateabout").addClass("d-none");
    }
  }

  function editabout(editabout){
    var editabout = editabout;
    data = new FormData();
    data.append("editabout", editabout);
    $.ajax({
      url: 'Ajax/edits.php',
      method: "POST",
      data: data,
      editabout:editabout,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(results) {

        $("#aboutid").val(results["idaboutus"]);
        $("#editname").val(results["name"]); 
        $("#editdescription").val(results["description"]);
        $("#edittitle").val(results["title"]);
        $("#editsurname").val(results["surname"]);
        $("#editimage").val(results["image"]);
    


      }
    });
  }
  function deleteabout(deleteaboutid){
    var deleteaboutid = deleteaboutid;

    $.ajax({
      type: 'GET',
      url: 'Ajax/aboutusAJAX.php',
      data: {
        'deleteaboutid': deleteaboutid
      },
      success: function(results) {
        $("#insertabout").addClass("d-none");
        $("#errorabout").addClass("d-none");
        $("#deleteabout").removeClass("d-none");
        $("#updateabout").addClass("d-none");
        showabout();

      }
    });
  }
  function updateabout(){
    // $("#aboutid").val(results["idaboutus"]);
//       $("#editname").val(results["name"]);
//       $("#edittitle").val(results["title"]);
//       $("#editsurname").val(results["surname"]);
//       $("#image").val(results["image"]);

var aboutid         =       $('#aboutid').val();
var editname        =       $('#editname').val();
var editdescription =       $('#editdescription').val();
var edittitle       =       $('#edittitle').val();
var editsurname     =       $('#editsurname').val();
var files_data      =       $('#editimage').prop('files')[0];
var editimage       =       $("#editimage").val();
var form_data = new FormData();
form_data.append('aboutid'        , aboutid);
form_data.append('editname'       , editname);
form_data.append('editdescription', editdescription);
form_data.append('edittitle'      , edittitle);
form_data.append('editsurname'    , editsurname);
form_data.append('editimage'      , editimage);
form_data.append('editimage'      , files_data);
$.ajax({
  url: "Ajax/aboutusAJAX.php",
  type: "POST",
  data: form_data,
  contentType: false,
  processData: false,
  cache:false,
  dataType: "text",
  success: function(results){
    $("#insertabout").addClass("d-none");
    $("#errorabout").addClass("d-none");
    $("#deleteabout").addClass("d-none");
    $("#updateabout").removeClass("d-none");
    $("#exampleModalScrollable").modal("hide");
showabout();
}
});
}
</script>
<?php
}else { header("Location:dashboard"); } }
?>