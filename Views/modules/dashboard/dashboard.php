    
<main>
  <div class="container-fluid">
        <?php
if(isset($_POST['search'])){
  $search = $_POST['search'];
  $results = new HomeModel();



if($results->Search($search)){
  echo "<h4>You search for : ".$search."</h4>";
  echo '<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Title</th>
        <th scope="col">Tekst</th>
        <th scope="col">Image</th>
      </tr>
    </thead>';

    foreach($results->Search($search) as $key=>$row){
      $key = 1;
      $Searchname = $row['name'];
      $Searchsurname = $row['surname'];
      $Searchtitle = $row['title'];
      $Searchtekst = $row['tekst'];
      $Searchimage = $row['image'];
      echo '<tbody>
              <tr>
                <th scope="row">'. $key++.'</th>
                <td>'.$Searchname.'</td>
                <td>'.$Searchsurname.'</td>
                <td>'.$Searchtitle.'</td>
                <td>'.$Searchtekst.'</td>
                <td><img src="Views/dist/img/'.$Searchimage.'" width="60px;"></td>
              </tr>
            </tbody>';
    }
    echo '</table>';
   }
   else{
    echo " This Client does not Exists . please click <a href='home'>here</a>";
   }
  

}
  
      ?>
  </div>

</main>
