<?php
require("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
src="https://kit.fontawesome.com/64d58efce2.js"
crossorigin="anonymous"
></script>
    <link rel="stylesheet" href="styleprofil1.css">
    <title>Archive</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#search-input").keyup(function() {
                var searchTerm = $(this).val();
                $("#my-table tr").each(function() {
                    if ($(this).text().indexOf(searchTerm) >= 0) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
    </script>
      <script>
        function setvisibility(id,visibility){
            document.getElementById(id).style.display=visibility;
        }
  
    </script>
 </head>
<body> 
<div class="container">
  <nav>
    <ul>
      <div class="sm">
        <li> 
            <a href="index.php" class="logo" >
            <img src="avatar.svg">
            <span class="nav-iten">Admin</span>
        </a>
    </li>
    <li> 
      <a href="index.php">
        <i class="fas fa-door-open"></i>
      <span class="nav-item">Accueil</span>
      </a>
  </li>

    <li class="lin"> 
         <i class="fas fa-file"></i> <input  onclick="setvisibility('sous','table') ;setvisibility('sous1','none');"type="button" class="nav-item" value="Liste des documents">
       <div  id="sous" class="sous">
         <ul>
          <li>
            <a href="liste_attestation.php" id="sous-menu" class="sous-menu" >
                <i class="fas fa-file-pdf"></i>
          <span class="nav-item">Attestation scolarite</span>
        </a>
          </li>
         <li>
        <a href="liste_convention.php"  id="sous-menu" class="sous-menu" >
            <i class="fas fa-file-pdf"></i>
      <span class="nav-item">Convention  stage</span>
    </a>
      </li>
         <li>
        <a href="liste_releve.php"  id="sous-menu"class="sous-menu" >
            <i class="fas fa-file-pdf"></i>
      <span class="nav-item">Releve de note</span>
    </a>
      </li>
    </ul>
  </div>
    </li>
    <li class="lin"> 
      <i class="fas fa-folder"></i>
    </i> <input   onclick="setvisibility('sous1','table') ;setvisibility('sous','none');"type="button" class="nav-item" value="Archive">
   <div id="sous1" class="sous1">
    <ul>
      <li>
        <a href="historique_attestation.php" class="sous-menu" >
            <i class="fas fa-file-pdf"></i>
      <span class="nav-item">Attestaion scolarite</span>
    </a>
      </li>
      <li>
        <a href="historique_convention.php" class="sous-menu" >
            <i class="fas fa-file-pdf"></i>
      <span class="nav-item">Convention stage</span>
    </a>
      </li>
      <li>
        <a href="historique_releve.php" class="sous-menu" > 
            <i class="fas fa-file-pdf"></i>
      <span class="nav-item">Releve de note</span>
    </a>
      </li>
</ul></div>
</li>
 <li> 
  <a href="index.html" class="logout" >
      <i class="fas fa-sign-out-alt"></i>
  <span class="nav-item">Déconnexion</span>
  </a>
</li>
  </div> 
 </ul>
</nav>
  
    <section class="main">
      <section class="Utilisateurs">
          <div class="users-list">
            <h1>l'historique des demandes des conventions</h1>
            <i class="fas fa-glass"></i>
            <table class="table" id="my-table">
            <input  type="search" placeholder="Search your document" id="search-input">

              <thead>
                <tr>
                  <th>#</th>
                  <th>nom</th>
                  <th>email </th>
                  <th  >N° apogee</th>
                  <th  scope="col">CNE</th>
                  <th>nom entreprise</th>
                  <th>action</th>
                </tr>
              </thead>
              <tbody>
              <?php
//1-
$query="SELECT * FROM `archive_conv` ";
$result=mysqli_query($con,$query);
$i=1;
while($row=mysqli_fetch_assoc($result)){
  ?>
  <tr>
    <th scope="row"><?=$i++?>.</th>
    <td><?=$row['nom']?>  <?=$row['prenom']?></td>
    <td><?=$row['email']?></td>
    <td><?=$row['apoge']?></td>  
    <td><?=$row['cne']?></td>  
    <td><?=$row['nom_entreprise']?></td>
    <td>
      <div class="icone">
      <a target="_blank" href="print-conv-arc.php?id=<?=$row['id']?>"><i class="fas fa-upload"></i></a>
      <a target="_blank" href="print-conv-arc-e.php?id=<?=$row['id']?>"><i class="fas fa-envelope"></i></a>
</div>
    </td>
  </tr>
 <?php } ?>
 </tbody>
 </table>
</div>
</body>
</html>