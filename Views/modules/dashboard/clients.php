<?php
$attributes = $_SESSION['attributes'];
$arrayAutorizim = explode(" ",$attributes);
foreach($arrayAutorizim as $row1){
  if(strpos($row1,"Clients")!==false) {
    ?>
    <main>
      <div class="container-fluid"><br>
        <h4 class="home-h4 ml-3"><b>Clients</b></h4>
        <p class="home-h4 ml-3">Form this modul you can change add edit clients review</p>
      </div>
      <div class="container-fluid">
        <div class="alert alert-success alert-dismissible  d-none" id="insertclients">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success! -</strong>  Registered Successfully .
        </div>
        <div class="alert alert-danger alert-dismissible  d-none" id="lastrow">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Last Row ! -</strong>  You can not delete the last row from Database .
        </div>
        <div class="alert alert-primary alert-dismissible  d-none" id="updateclients">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Update! -</strong>  Updated Successfully .
        </div>
        <div class="alert alert-danger alert-dismissible  d-none" id="errorclients">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>*Error! -</strong> All fields are required .
        </div>
        <div class="alert alert-warning alert-dismissible d-none" id="deleteclients">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Deleted! -</strong> Deleted Successfully .
        </div>
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
            <h4 class="home-h4-card ml-3" >Add new client review</h4>
            <div class="card home-card">
              <div class="card-body">
                <div class="form-group d-flex card-body-home">
                  <label for="username" class="mt-3"><b>Name</b></label>
                  <input class="form-control costum-input-home ml-5" type="text" id="name" name="name" placeholder="Name">
                </div>
                <div class="form-group d-flex card-body-home">
                  <label for="username" class="mt-3"><b>Surname</b></label>
                  <input class="form-control costum-input-home ml-4 custom-responsive-clients-surname" type="text" name="surname" id="surname" placeholder="Surname">
                </div>
                <div class="form-group d-flex card-body-home">
                  <label for="username" class="mt-3 mr-3"><b>Tittle</b></label>
                  <input class="form-control costum-input-home ml-5" type="text" id="title" name="title" placeholder="Eg.Student">
                </div>
                <div class="form-group d-flex card-body-home">
                  <div class="form-group d-flex card-body-home custom-file " required>
                    <label for="username" class="mt-3 mr-3"><b>Image</b></label>
                    <div class="custom-file">
                      <input type="file" class="custom-file-input ml-3" id="image" name="image" onchange="Clientsimg(event)">
                      <label class="custom-file-label costum-input-home" for="inputGroupFile04" id="image" name="image"><span class="custom-label-image">Background Image</span></label>
                    </div>
                  </div>
                </div>
                <div class="row text-center" style="margin-bottom:30px;margin-top: -50px!important ">
                  <div class="card-body">
                  <img src="Views/dist/img/user.png" id="output" class="foto img-radius col-4 img-custom-back" id="image" name="image"/>
                </div>
                </div>
                <div class="form-group d-flex">
                  <label for="exampleFormControlTextarea2"><b>Text</b></label>
                  <textarea class="form-control card-body-textarea rounded-0 ml-5" id="text" name="text" rows="3"></textarea>
                </div>
                <button class="btn btn-success-custom-service btn-sm float-right mt-4" type="button" onclick="InsertClient()">Add</button>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
            <h4 class="home-h4-card ml-4">List of your clients review</h4>
            <div class="card home-card ml-1">
              <div class="card-body table-responsive">
                <table class="table table-striped text-nowrap card-body-home" id="myTables">
                  <thead class="thead custom-table-head">
                    <tr class="custom-tr-table text-center">
                      <th scope="col" class="w-25">Name</th>
                      <th scope="col" class="w-25">TITLE</th>
                      <th scope="col" class="w-25">Image</th>
                      <th scope="col" class="w-25">TEXT</th>
                      <th scope="col" class="w-25">OPTIONS</th>
                    </tr>
                  </thead>
                  <tbody class="custom-table-body" id="showclients">

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- Button trigger modal -->
        </div>
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
              <div class="modal-body">
                <div class="card-body">
                  <input type="text" name="idclients" id="idclients" class="form-control d-none">
                  <div class="form-group d-flex card-body-home">
                    <label for="username" class="mt-3"><b>Name</b></label>
                    <input class="form-control costum-input-home ml-5" type="text" id="editname" name="editname" placeholder="Name">
                  </div>
                  <div class="form-group d-flex card-body-home">
                    <label for="username" class="mt-3"><b>Surname</b></label>
                    <input class="form-control costum-input-home ml-4 custom-responsive-clients-surname" type="text" name="editsurname" id="editsurname" placeholder="Surname">
                  </div>
                  <div class="form-group d-flex card-body-home">
                    <label for="username" class="mt-3"><b>Tittle</b></label>
                    <input class="form-control costum-input-home ml-5" type="text" id="edittitle" name="edittitle" placeholder="Eg.Student">
                  </div>
                  <div class="form-group d-flex card-body-home">
                    <div class="form-group d-flex card-body-home custom-file " required>
                      <label for="username" class="mt-3 mr-3"><b>Image</b></label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input ml-3" id="editimage" name="editimage" onchange="Clientsimg2(event)">
                        <label class="custom-file-label costum-input-home" for="inputGroupFile04" id="editimage" name="editimage"><span class="custom-label-image">Background Image</span></label>
                      </div>
                    </div>
                  </div>
                  <div class="row text-center" style="margin-bottom:30px;">
                    <div class="card-body">
                    <img src="Views/dist/img/user.png" id="output2" class="foto img-radius img-custom-back col-4" id="editimage" name="editimage"/>
                  </div>
                  </div>
                  <div class="form-group d-flex">
                    <label for="exampleFormControlTextarea2"><b>Text</b></label>
                    <textarea class="form-control card-body-textarea rounded-0 ml-5" id="edittext" name="edittext" rows="3"></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateclients();">Save changes</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    function alertdelete(){
      $("#errorclients").addClass("d-none");
      $("#insertclients").addClass("d-none");
      $("#deleteclients").addClass("d-none");
      $("#updateclients").addClass("d-none");
      $("#lastrow").removeClass("d-none");
    }
    $(document).ready( function () {
      $('#myTables').DataTable();
    }
    );
    showclients();
    function showclients(){
      $.ajax({
        method: 'POST',
        url: "Ajax/clientsAJAX.php",
        success: function(results) {
          $("#showclients").html(results);
        }
      });
    }
    function test(){
      $('[data-toggle="popover"]').popover({
        trigger: 'focus'
      })
    }
    var Clientsimg    = function(event){
      var output     = document.getElementById('output');
      output.src     = URL.createObjectURL(event.target.files[0]);
    }
    var Clientsimg2   = function(event){
      var output2    = document.getElementById('output2');
      output2.src    = URL.createObjectURL(event.target.files[0]);
    }
    function InsertClient(){
      var name         =  $("#name").val();
      var surname      =  $("#surname").val();
      var title        =  $("#title").val();
      var text         =  $("#text").val();
      var files_data   =  $('#image').prop('files')[0];
      var image        =  $("#image").val();
      var form_about   =   new FormData();
      form_about.append('name', name);
      form_about.append('surname', surname);
      form_about.append('title', title);
      form_about.append('text', text);
      form_about.append('image', files_data);
      form_about.append('image', image);
      if(name !="" && surname !="" && image !=""){
        $.ajax({
          url: 'Ajax/clientsAJAX.php',
          cache: false,
          contentType: false,
          processData: false,
          data: form_about,
          name: name,
          surname: surname,
          title: title,
          text: text,
          image: image,
          dataType:"text",
          type: 'post',
          success: function(results){
            var name         =  $("#name").val("");
            var surname      =  $("#surname").val("");
            var title        =  $("#title").val("");
            var text         =  $("#text").val("");
            $("#errorclients").addClass("d-none");
            $("#insertclients").removeClass("d-none");
            $("#deleteclients").addClass("d-none");
            $("#updateclients").addClass("d-none");
            $("#lastrow").addClass("d-none");
            showclients();

          }
        });
      }else{
        $("#errorclients").removeClass("d-none");
        $("#insertclients").addClass("d-none");
        $("#deleteclients").addClass("d-none");
        $("#updateclients").addClass("d-none");
      }
    }
    function editclients(editclientsid){
      var editclientsid = editclientsid;
      data = new FormData();
      data.append("editclientsid", editclientsid);
      $.ajax({
        url: 'Ajax/edits.php',
        method: "POST",
        data: data,
        editclientsid:editclientsid,
        cache: false,
        contentType: false,
        processData: false,
        dataType:"json",
        success: function(results) {
          $("#idclients").val(results['idclients']);
          $("#editname").val(results["name"]);
          $("#editsurname").val(results["surname"]);
          $("#edittitle").val(results["title"]);
          $("#edittext").val(results["tekst"]);
          $("#editimage").val(results["image"]);
          if(results["image"] !=""){
            $(".foto").attr('src',"Views/dist/img/"+results["image"]);
          }else{
            $(".is").attr('src',"Views/dist/img/"+results["image"]);
          }
        }
      });
    }
    function deleteclients(idclients){
      var idclients = idclients;
      $.ajax({
        type: 'GET',
        url: 'Ajax/clientsAJAX.php',
        data: {
          'idclients': idclients
        },
        success: function(results) {
          $("#errorclients").addClass("d-none");
          $("#insertclients").addClass("d-none");
          $("#deleteclients").removeClass("d-none");
          $("#updateclients").addClass("d-none");
          $("#lastrow").addClass("d-none");
          showclients();

        }
      });
    }
    function updateclients(){
      var editidclients     =       $('#idclients').val();
      var editname        =       $('#editname').val();
      var editsurname       =       $('#editsurname').val();
      var edittitle       =       $('#edittitle').val();
      var edittext          =       $('#edittext').val();
      var files_data      =       $('#editimage').prop('files')[0];
      var editimage         =       $("#editimage").val();
      var form_data        =       new FormData();
      form_data.append('idclients', editidclients);
      form_data.append('editname', editname);
      form_data.append('editsurname', editsurname);
      form_data.append('edittitle', edittitle);
      form_data.append('edittext', edittext);
      form_data.append('editimage', files_data);
      form_data.append('editimage', editimage);

      if(editname !="" && editsurname !=""){
        $.ajax({
          url: "Ajax/clientsAJAX.php",
          type: "POST",
          data: form_data,
          contentType: false,
          processData: false,
          cache:false,
          dataType: "text",
          success: function(results){
            $("#lastrow").addClass("d-none");
            $("#errorclients").addClass("d-none");
            $("#insertclients").addClass("d-none");
            $("#deleteclients").addClass("d-none");
            $("#updateclients").removeClass("d-none");
            $("#exampleModalLong").modal("hide");
            showclients();
          }
        });
      }else{
        $("#errorclients").removeClass("d-none");
        $("#insertclients").addClass("d-none");
        $("#deleteclients").addClass("d-none");
        $("#updateclients").addClass("d-none");
      }
    }
  </script>
  <?php
}else { header("Location:dashboard"); } }
?>