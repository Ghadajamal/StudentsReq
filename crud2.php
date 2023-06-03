<?php

require("connection.php");

if(isset($_POST['enregistrer']))
{
  foreach($_POST as $key => $value){
    // this is to ignore errors made by special keys or letters or whatever
    // we store the sjit in post(key)
    $_POST[$key] = mysqli_real_escape_string($con,$value);
  }

  $choix = $_POST['choix'];

  $query = "INSERT INTO `convention`(`nom`, `prenom`, `filiere`,`email`, `nom_entreprise`, `adress_entreprise`, `telephone`, `telecopie`, `nature`, `nom_representant`)
   VALUES ('$_POST[nom]','$_POST[prenom]','$_POST[filiere]','$_POST[email]','$_POST[nom_entreprise]','$_POST[adress_entreprise]','$_POST[telephone]','$_POST[telecopie]','$_POST[nature]','$_POST[nom_representant]')";

$query2 = "INSERT INTO `archive_conv`(`nom`, `prenom`, `filiere`,`email`, `nom_entreprise`, `adress_entreprise`, `telephone`, `telecopie`, `nature`, `nom_representant`)
VALUES ('$_POST[nom]','$_POST[prenom]','$_POST[filiere]','$_POST[email]','$_POST[nom_entreprise]','$_POST[adress_entreprise]','$_POST[telephone]','$_POST[telecopie]','$_POST[nature]','$_POST[nom_representant]')";


mysqli_query($con,$query2);
if(mysqli_query($con,$query))
{
    //if means that if this query exectued successfully
    header("location: index.php?success=added");
}
else{
    header("location: index.php?alert=add_failed");
}

} 


?>