<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="att.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-light">
<div class="container bg-dark text-light p-3 rounded my-4">
            
            <div class="encadrer-un-contenu">
                <img align="right" src="image.jpeg">
            <p align="left"> <p> </p> ROYAUMME DU MAROC UNUVERSITE</p>
            <p align="left" >  <p> </p> ABDELMAEK ESSAADI</p>
            <p>  ecole nationale des sciences</p>
                <p>  appliquees Tetouan</p>
        </div>
    
    </div>

    <h1 align="center"> ATTESTATION </h1>
    <p> le Directeur de l'ecole natinale des sciences appliquees de tetouan, atteste que :</p>
    <br><br>
    <p> NOM ET PRENOM :<?=$user['nom']?>  <?=$user['prenom']?> </p> 
    <p>CNE : <?=$user['cne']?></p>   
   <p> n apoge : <?=$user['apoge']?> </p>
   <p> Filiere : <?=$user['filiere']?> </p>
   <br>
   <p>est continue(e) ses etudes a l'ENSA NARIONALE DES SCIENCES APPLIQUEES, en <?=$user['filiere']?> </p>
    <p>pour l'annee unversitaire 2022/2023</p>
     <h4>la presence attestation est delivree  l'interesse(e) pour servir et valoir ce que de droit. </h4>
     <p align="center"  >Fait a TETOUAN de : 12/14/2022</p>
</body>
     
</html>