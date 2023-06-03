<!DOCTYPE html>
<html>
    <head>
        <title>CONVENTION DE STAGE</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link href="conv.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    </head>
<body>
    <div class="container bg-dark text-light p-3 rounded my-4">
            
        <div class="encadrer-un-contenu">
            <img align="right" src="image.jpeg">
        <p align="left"> <p> </p> ROYAUMME DU MAROC UNUVERSITE</p>
        <p align="left" >  <p> </p> ABDELMAEK ESSAADI</p>
        <p>  ecole nationale des sciences</p>
            <p>  appliquees Tetouan</p>
    </div>
<h1 align="center"> CONVENSION DE STAGE</h1>
   

<table>
    <div class="entreprise">
    <h5> D’AUTRE PART</h5>
     NOM:  <?=$user['nom_entreprise']?> 
     <br><br>
     Adresse : <?=$user['adress_entreprise']?> <br><br>
     <div class="tnt">
     Telephone : <?=$user['telephone']?> 
    <br><br>
      Telecopie : <?=$user['telecopie']?> 
    </div>
    <br><br>
    Representee par : <?=$user['nom_representant']?> 
    <br><br>
    Nature de l'activite : <?=$user['nature']?> 
    <br><br>
    <div class="etudiant">
    <P> L'etablissement d'acceuil accepte de recevoir le stagiaire : </P>
    Nom : <?=$user['nom']?> 
    <br><br>
    Prenom :<?=$user['prenom']?> 
    <br><br>
    Filiere : <?=$user['filiere']?> 
    <br><br>
    <div class="ARTICLES">
    <h5> ARTICLE : DUREE DU STAGE ET HORAIRES DE TRAVAIL </h5>
    <P>la duree de stage est de 8 Semaines, Durant son stage le stagiaire devra de plier aux horaires en vigueur dans l'entreprise d'acceuil.</P>  
    </div>



    </div>
</table>
</body>
</html>