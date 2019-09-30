<div class="bg-light border-right" id="sidebar-wrapper">
  <div class="sidebar-heading text-center custom-logo-navbar bg-light">
    <a href="contact" class="btn-light"><span class="dental">DENTAL<span><span class="cms">CMS</span></a>
    <div class="d-flex float-right custom-responsive-span">
          <span class="custom-d d-none">D</span>
          <span class="custom-c d-none">C</span>
        </div>
  </div>
  <div class="list-group list-group-flush custom-left-side">
    <a href="home" class="list-group-item list-group-item-action bg-transparent custom-service mt-4 active" active>
      <i class="fas fa-home mr-4"></i> <span>Home</span>
    </a>
    <a href="my-account" class="list-group-item list-group-item-action bg-transparent custom-service mt-4" active>
      <i class="fas fa-user-circle mr-4"></i> <span>My Account</span>
    </a>
    <?php
    $attributes = $_SESSION['attributes'];
    $arrayAutorizim = explode(" ",$attributes);
    foreach($arrayAutorizim as $row1){ ?>
      <?php
      if(strpos($row1, "Clients" ) !== false) { ?>
        <a href="clients" class="list-group-item list-group-item-action bg-transparent custom-service mt-4">
          <i class="far fa-comments mr-4"></i></i> <span>Clients</span>
        </a>
      <?php } ?>
      <?php
      if(strpos($row1, "users" ) !== false) { ?>
        <a href="users" class="list-group-item list-group-item-action bg-transparent custom-service mt-4">
          <i class="fas fa-user-friends mr-4"></i> <span>Users</span>
        </a>
      <?php }  ?>
      <?php
      if(strpos($row1, "AboutUs" ) !== false) { ?>
        <a href="aboutus" class="list-group-item list-group-item-action bg-transparent custom-service mt-4">
          <i class="fas fa-info-circle mr-4"></i> <span>About Us</span>
        </a>
      <?php } ?>
      <?php
      if(strpos($row1, "Service" ) !== false) { ?>
        <a href="service" class="list-group-item list-group-item-action bg-transparent custom-service mt-4">
          <i class="fas fa-cog mr-4"></i> <span>Service</span>
        </a>
      <?php } ?>
      <?php
      if(strpos($row1, "Contact" ) !== false) { ?>
        <a href="contact" class="list-group-item list-group-item-action bg-transparent custom-service mt-4">
          <i class="fas fa-id-card-alt mr-4"></i> <span>Contact</span>
        </a>
      <?php } ?>
      <?php
      if (strpos($row1, "Appointments" ) !== false) { ?>
        <a href="appointments" class="list-group-item list-group-item-action bg-transparent custom-service mt-4">
          <i class="fas fa-calendar-alt mr-4"></i> <span>Appointmens</span>
        </a>
      <?php } ?>
    <?php } ?>
    
    <a href="messages" class="list-group-item list-group-item-action bg-transparent custom-service mt-4" active>
      <i class="fas fa-envelope mr-4"></i> <span>Messages</span>
    </a>
  </div>
</div>
<!-- /#sidebar-wrapper -->