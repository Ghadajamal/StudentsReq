<?php
require("connection.php");
include("session.php");


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
    <link rel="stylesheet" href="espace1.css">
    <title>Espace admin</title>
    <style>
    .sous{
      display: none;
  }
  .sous1{
      display: none;
  }
  </style>
  <script>
      function setvisibility(id,visibility){
          document.getElementById(id).style.display=visibility;
      }

  </script>
  
</head>
<body> 

<?php
if(isset($_SESSION['userid'])){
      $user=$_SESSION['email'];
}else{
header("Location: login.php ");
}
?>


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
          <span class="nav-item">Convention de stage</span>
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
          <span class="nav-item">Attestaion de scolarite</span>
        </a>
          </li>
          <li>
            <a href="historique_convention.php" class="sous-menu" >
                <i class="fas fa-file-pdf"></i>
          <span class="nav-item">Convention de stage</span>
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
  
        <div class="row">
          <div class="users">
            <div class="card">
              <img src="img/6.svg">
              <h4>LISTE</h4>
              <p>Demandes d'attestation </p>
              
             <a href="liste_attestation.php"> <input class="en" type="button" value="Voir"></a>
            </div>
            <div class="card">
              <img src="img/7.svg">
              <h4>LISTE</h4>
              <p>Demandes des convention de stage</p>
             <a href="liste_convention.php"><input class="en"  type="button" value="Voir"></a> 

            </div>
            <div class="card">
              <img src="img/8.svg">
              <h4>LISTE</h4>
              <p>Demandes des relevés de notes</p>
              <a href="liste_releve.php">  <input class="en" type="button" value="Voir"></a> 
            </div>
            <div class="card">
              <img src="img/9.svg">
              <h4>HISTORIQUE </h4>
              <p>Demandes d'attestation</p>
    
             <a href="historique_attestation.php"> <input class="en" type="button" value="Voir"></a>
            </div>
            <div class="card">
              <img src="img/10.svg">
              <h4>HISTORIQUE </h4>
              <p>Demandes des convention de stage</p>
    
             <a href="historique_convention.php"> <input class="en"  type="button" value="Voir"></a>
            </div>
            <div class="card">
              <img src="img/11.svg">
              <h4>HISTORIQUE </h4>
              <p>Demandes des relevés de notes</p>
    
            <a href="historique_releve.php">  <input class="en" type="button" value="Voir"></a>
            </div>
            
          </div</div>
       

</body>
</html>