<?php
require("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Information sur l'entreprise</title>
</head>
<body>
<div class="container">
        <div class="heading">Demande de convention</div>
        <form action="crud2.php" method="POST" enctype="multipart/form-data">
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
                    <span class="details">Filiere</span>
                    <input type="text" placeholder="Enter your filiere" name="filiere" required>
                </div>
                <div class="card-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="Enter your CNE" name="email" required>
                </div>
                <div class="card-box">
                    <span class="details">Nom d'entreprise</span>
                    <input type="text" placeholder="Enter your CNE" name="nom_entreprise" required>
                </div>
                <div class="card-box">
                    <span class="details">Adress d'entreprise</span>
                    <input type="text" placeholder="Enter your email" name="adress_entreprise" required>
                </div>
            
                <div class="card-box">
                    <span class="details"> Telephone</span>
                    <input type="text" placeholder="Enter your fname" name="telephone" required>
                </div>
                <div class="card-box">
                    <span class="details">Telecopie</span>
                    <input type="text" placeholder="Enter your Lname" name="telecopie" required>
                </div>
                <div class="card-box">
                    <span class="details">Nature d"'activite</span>
                    <input type="text" placeholder="Enter your n° Appogé" name="nature" required>
                </div>
                <div class="card-box">
                    <span class="details">Nom represantant</span>
                    <input type="text" placeholder="Enter your CNE" name="nom_representant" required>
                </div>
           
              <!--------------------------------------->
        
            <div class="button">
                <input type="submit" value="Enregistrer " name="enregistrer">
            </div>

        </form>
    </div>
</body>
</html>