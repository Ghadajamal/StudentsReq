<?php
include('config.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Dynamic pdf generate</title>
</head>

<body>
  <div class="container">

  
  
  <h1 class="text-center">PDF Generate in Php</h1>

  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">apogee</th>
            <th scope="col">filiere</th>
            <th scope="col">nom</th>
            <th scope="col">prenom</th>
            <th scope="col">date de naissance</th>
            <th scope="col">ville</th>
          </tr>
        </thead>
        <tbody>
          <?php $query = mysqli_query($con,"SELECT * FROM demanderel "); 
          $i=1;
          while($row = mysqli_fetch_assoc($query))
          {
          ?>
          <tr>
            <th scope="row"><?=$i++?>.</th>
            <td><?=$row['apogee']?></td>
            <td><?=$row['filiere']?></td>
            <td><?=$row['nom']?></td>
            <td><?=$row['prenom']?></td>
            <td><?=$row['CNE']?></td> 
            <td><?=$row['date_naissance']?></td>
            <td>
              <a target="_blank" href="details.php?id=<?=$row['apogee']?>" class="btn btn-sm btn-primary"> <i class="fa fa-file-pdf-o"></i> Print  Details</a>
            </td>
          </tr>
         <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  </div>