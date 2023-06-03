<?php
require("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="all.css">
    <title>Demande de document</title>
    <style>
    .conv{
        display: none;
    }
    .relev{
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
    <div class="container">
        <div class="heading">Demande du document</div>
        <form action="crud.php" method="POST" enctype="multipart/form-data">
            <div class="card-details">
                <!---------------------------------->
                <div class="card-box">
                    <span class="details"> Nom</span>
                    <input type="text" placeholder="Enter your fname" name="nom" required>
                </div>
                <div class="card-box">
                    <span class="details">Prenom</span>
                    <input type="text" placeholder="Enter your Lname" name="prenom" required>
                </div>
                <div class="card-box">
                    <span class="details">N° Appogé</span>
                    <input type="text" placeholder="Enter your n° Appogé" name="apoge" required>
                </div>
                <div class="card-box">
                    <span class="details">CNE</span>
                    <input type="text" placeholder="Enter your CNE" name="cne" required>
                </div>
                <div class="card-box">
                    <span class="details">EMAIL</span>
                    <input type="text" placeholder="Enter your email" name="email" required>
                </div>
                <div class="card-box">
                    <span class="details">Filiere</span>
                    <input type="text" placeholder="Enter your filiere" name="filiere" required>
                </div>

              <!--------------------------------------->
             
              </div>
            <div class="circle-form">
                 <span class="circle-title">Choix du document</span>
                 <div class="category">
                    <input onclick="setvisibility('conv','none');setvisibility('relev','none');" type="radio" value="attestation" name="choix">Attestaion scolaire
                    <input  onclick="setvisibility('conv','flex') ;setvisibility('relev','none');"type="radio" name="choix" value="convention">
                    <label for="convention">Convention du stage</label>
                    <input  onclick="setvisibility('relev','flex');setvisibility('conv','none');" type="radio" name="choix" value="releve">Relevé de notes
                 </div>
            </div>

       

               <!---------------------------------->
               <div id="conv" class="conv">
                    <div class="card-box1">
                        <span class="details">Nom d'entreprise</span>
                        <input type="text" placeholder="Enter your CNE" name="nom_entreprise" >
                    </div>
                    <div class="card-box1">
                        <span class="details">Adress d'entreprise</span>
                        <input type="text" placeholder="Enter your email" name="adress_entreprise" >
                    </div>
                
                    <div class="card-box1">
                        <span class="details"> Telephone</span>
                        <input type="text" placeholder="Enter your fname" name="telephone" >
                    </div>
                    <div class="card-box1">
                        <span class="details">Telecopie</span>
                        <input type="text" placeholder="Enter your Lname" name="telecopie" >
                    </div>
                    <div class="card-box1">
                        <span class="details">Nature d"'activite</span>
                        <input type="text" placeholder="Enter your n° Appogé" name="nature" >
                    </div>
                    <div class="card-box1">
                        <span class="details">Nom represantant</span>
                        <input type="text" placeholder="Enter your CNE" name="nom_representant" >
                    </div>
                </div>
                <div id="relev" class="relev">
                    <div class="card-box1">
                        <span class="details">Semestre</span>
                        <input type="text" placeholder="Enter your Semestre" name="Semestre" >
                    </div>
                    <div class="card-box1">
                        <span class="details">L'annee universitaire</span>
                        <input type="text" placeholder="Enter l'annee " name="L'annee universitaire" >
                    </div>
                </div>
        
    

       

            <div class="button">
                <input type="submit" value="Envoyer" name="envoyer">
            </div>

        </form>
    </div>
</body>
</html>