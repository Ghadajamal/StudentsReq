<?php
include('connection.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF_8">
        <meta charset="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    <title> RELEVE DE NOTES ET RESULTATS  </title>
    </head>
    <body>
        <div class="fullcontainer ">
        <table border="5" cellspacing="0" width="500" >
            <tr>
                <th>
                    <div class="container">
                        <diV class="nomunifr">Université Abdelmalek Essaadi &nbsp; &nbsp; &nbsp; &nbsp;</diV>
                    </div>
                        <diV class="annee">Année universitaire 2022/2023 </diV>
                </th>
            </tr>
        </table>
        <table border="0" cellspacing="0" width="500">
            <tr>
                <th>
                    <div class="entete">
                        <div class ="nomecolefr"> Ecole Nationale des Sciences Appliquées Tétouan </div>

                    </div>
                </th>
            </tr>
        </table>

            <table border="3" cellspacing="0" width="400" >
                <tr>
                    <th>
                        RELEVE DE NOTES ET RESULTATS
                    </th>
                </tr>
            </table>
            <table border="2" cellspacing="0" width="200" >
                <tr>
                    <th>
                        Session
                    </th>
                </tr>
            </table>
            


        <div class="infoetu">
            <div class ="nometu"> 
                <h4>Nom et Prénom : <?=$user['nom'].' '.$user['prenom']?></h4>  
            </div>
            <div class ="apogee"> 
                <h4>N° Etudiant : <?=$user['apogee']?></h4>  
            </div>
            <div class ="CNE"> 
                <h4>CNE :<?=$user['CNE']?></h4>  
            </div>
            <div class ="date_naissance"> 
                <h4>Née le : <?=$user['date_naissance']?></h4>  
            </div>
            <div class ="ville"> 
                <h4>à <?=$user['ville']?></h4>  
            </div>
            <div class ="niveau"> 
                <h4>inscrit (e) en : <?=$user['filiere']?></h4>  
            </div>

        </div>
        <table border="1" cellspacing="0" width="500" >
        <tr>
                <th scope="col">Module</th>
                <th scope="col">Note/Barème</th>
                <th scope="col">Résultat</th>
                <th scope="col">Session</th>
                <th scope="col">Pts jury</th>

            </tr>
     
        <?php $query = mysqli_query($con,"SELECT nom_module,apogee, note, resultat, session , pts_jury FROM Notes, Module where  Notes.ID_module=Module.ID_module  and Notes.apogee= ".$user['apogee'] ); 
          $i=1;
          while($row = mysqli_fetch_assoc($query))
          {  ?>

          <tr>
            <td><?=$row['nom_module']?></td>
            <td><?=$row['note']?></td>
            <td><?=$row['resultat']?></td>
            <td><?=$row['session']?></td>
            <td><?=$row['pts_jury']?></td>
        
          </tr>
         <?php } ?>
         <?php $query1 = mysqli_query($con,"SELECT avg(note) as avg_note FROM Notes where apogee= ".$user['apogee'] .  " GROUP by apogee "); 
          $i=1;
          while($row = mysqli_fetch_assoc($query1))
          {  ?>

          <tr>
            <th scope="col">Resultat d'admission : <?=$row['avg_note']?>  </th>

            </th>
          </tr>
         <?php } ?>



                
        </table>
        <div class="baspage">
            <h4>Fait à Tétouan le 06/02/2022 <br> Le Directeur de l'ecole Nationale des Sciences Appliquées de Tétouan <br> <br>             Le Directeur </h4>            
        </div>
        <div class="plusbas">
            <h6>Avis Important : il ne peut etre délivré qu'un seul exemplaire du présent relevé de notes. Aucun duplicata ne sera fourni.</h6>
        </div>

    </div>
    </body>
</html>