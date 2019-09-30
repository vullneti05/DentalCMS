<?php 
$attributes = $_SESSION['attributes'];
$arrayAutorizim = explode(" ",$attributes); 
foreach($arrayAutorizim as $row1){ 
if(strpos($row1,"Contact")!==false) { 
?>
<main>
  <div class="container-fluid"><br>
    <h4 class="home-h4 ml-3"><b>Contact</b></h4>
    <p class="home-h4 ml-3">Form this modul you can change add edit your company contact</p>
  </div>
  <div class="container-fluid">
  <div class="alert alert-success alert-dismissible col-lg-6  d-none" id="updatecontact">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Updated! -</strong>  Updated Successfully .
  </div>  
  <div class="alert alert-danger alert-dismissible col-lg-6  d-none" id="errorcontact">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>*Error! -</strong>  All fields are Required .
  </div>  
    <div class="row" id="contact">

    </div>
<div class="row" id="socialmedias">

</div>
  </div>

</main>

<script>


showcontact();
function showcontact(){
    $.ajax({
        method: 'POST',
        url: "Ajax/contactAJAX.php",
        success: function(results) {
            $("#contact").html(results);
        }
    });
}
function Csocialmedia(){

   var facebook       =       $('#facebook').val();
   var instagram      =       $('#instagram').val();
   var twitter        =       $('#twitter').val();


   var form_data = new FormData();       

    form_data.append('facebook', facebook);
    form_data.append('instagram', instagram);
    form_data.append('twitter', twitter);

    if(facebook !="" && instagram !="" && twitter !=""){



    $.ajax({
        url: "Ajax/contactAJAX.php",
        type: "POST",
        data: form_data,
        contentType: false,
        processData: false,
        cache:false,
        dataType: "text",
        success: function(results){
        $("#updatecontact").removeClass('d-none');
        $("#errorcontact").addClass('d-none');
        showcontact();
        }
    });

       }else{
        $("#updatecontact").addClass('d-none');
        $("#errorcontact").removeClass('d-none');
       }
}
function update(){
   var location       =       $('#location').val();
   var phonenumber    =       $('#phonenumber').val();
   var email          =       $('#email').val();

   var form_data = new FormData();       

    form_data.append('location', location);
    form_data.append('phonenumber', phonenumber);
    form_data.append('email', email);

    if(location !="" && phonenumber !="" && email !=""){



    $.ajax({
        url: "Ajax/contactAJAX.php",
        type: "POST",
        data: form_data,
        contentType: false,
        processData: false,
        cache:false,
        dataType: "text",
        success: function(results){
        $("#updatecontact").removeClass('d-none');
        $("#errorcontact").addClass('d-none');
        showcontact();
        }
    });

       }else{
        $("#updatecontact").addClass('d-none');
        $("#errorcontact").removeClass('d-none');
       }
}
</script>
<?php 
}else { header("Location:dashboard"); } }
?>