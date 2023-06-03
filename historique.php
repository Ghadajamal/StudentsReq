<?php
require("connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des demandes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<!--the bar -->    
<div class="container bg-dark text-light p-3 rounded my-4">
    <div  >
        <!--ici on peut ajouter le lien de sites on veut visiter just avec a-href-->
        <h2 align="center" >historique des demandes</h2>
    </div>
</div>


    <!--------------------------->
   <div class="container mt-5 p-0">
   <table class="table table-hover text-center">
  <thead  class="bg-dark text-light">
    <tr>
      <th width="5%" scope="col" class="rounded-start">#</th>
      <th width="15%" scope="col">Nom</th>
      <th width="10%" scope="col">Prenom</th>
      <th width="10%" scope="col">N° apogee</th>
      <th width="10%" scope="col">CNE</th>
      <th width="30%" scope="col">Email</th>
      <th width="5%" scope="col">Filiere</th>
      <th width="5%" scope="col">type de document</th>
      <th width="5%" scope="col" class="rounded-end">action</th>
    </tr>
  </thead>
  <tbody class="bg-white">

<?php
//1-
$query="SELECT * FROM `etudiant` ";
$result=mysqli_query($con,$query);
$i=1;
while($row=mysqli_fetch_assoc($result)){
  ?>
  <tr>
    <th scope="row"><?=$i++?>.</th>
    <td><?=$row['nom']?></td>
    <td><?=$row['prenom']?></td>
    <td><?=$row['apoge']?></td>
    <td><?=$row['cne']?></td>
    <td><?=$row['email']?></td>
    <td><?=$row['filiere']?></td>
    <td><?=$row['choix']?></td>

    <td>
      <a target="_blank" href="print-details.php?id=<?=$row['id']?>" class="btn btn-sm btn-primary"> <i class="fa fa-file-pdf-o"></i> Telecharger le document</a>
    </td>
  </tr>
 <?php } ?>



   
  </tbody>
</table>
   </div>