<?php

//2-
require("connection.php");

if(isset($_POST['envoyer'])){

  //nom
if(empty($_POST['nom'])){
  $nom=null;
  $flag=false;
}else {
  $nom = $_POST['nom'];
  $flag = true;
}

//prenom 

if(empty($_POST['prenom'])){
  $prenom=null;
  $flag=false;
}else {
  $prenom = $_POST['prenom'];
  $flag=true;
}

//apoge

if(empty($_POST['apoge'])){
  $apoge=null;
  $flag=false;
}else {
  $apoge = $_POST['apoge'];
  $flag=true;
}

//cne

if(empty($_POST['cne'])){
  $cne=null;
  $flag=false;
}else {
  $cne = $_POST['cne'];
  $flag=true;
}

//email

if(empty($_POST['email'])){
  $email=null;
  $flag=false;
}else {
  $email = $_POST['email'];
  $flag=true;
}


//filiere

if(empty($_POST['filiere'])){
  $filiere=null;
  $flag=false;
}else {
  $filiere = $_POST['filiere'];
  $flag=true;
}
 $choix =$_POST['choix'];

if($flag){
  
$query ="SELECT * FROM  `etudiant1` WHERE `nom`='".$nom."' AND `prenom` ='".$prenom ."'  AND  `apoge` ='".$apoge."'  AND `cne` ='".$cne."'  AND `email` ='".$email."'  AND `filiere` ='".$filiere."'         ";
$result=mysqli_query($con,$query);
$r=mysqli_fetch_assoc($result);


if(!empty($r['id'])){
if($choix = 'attestation'){
  $query1 ="INSERT INTO `archive`(`nom`, `prenom`, `apoge`, `cne`, `email`, `filiere` ) 
  VALUES ('$_POST[nom]','$_POST[prenom]','$_POST[apoge]','$_POST[cne]','$_POST[email]','$_POST[filiere]')";
  $query2 ="INSERT INTO `demandeAtt`(`nom`, `prenom`, `apoge`, `cne`, `email`, `filiere` ) 
  VALUES ('$_POST[nom]','$_POST[prenom]','$_POST[apoge]','$_POST[cne]','$_POST[email]','$_POST[filiere]')";
  mysqli_query($con,$query1);
  mysqli_query($con,$query2);
}

if($choix = 'convention'){
  $query1 = "INSERT INTO `archive_conv`(`nom`, `prenom`, `filiere`,`email`,`apoge`, `cne`, `nom_entreprise`, `adress_entreprise`, `telephone`, `telecopie`, `nature`, `nom_representant`)
  VALUES ('$_POST[nom]','$_POST[prenom]','$_POST[filiere]','$_POST[email]','$_POST[apoge]','$_POST[cne]', '$_POST[nom_entreprise]','$_POST[adress_entreprise]','$_POST[telephone]','$_POST[telecopie]','$_POST[nature]','$_POST[nom_representant]')";
  
  $query2 = "INSERT INTO `demandeconv`(`nom`, `prenom`, `apoge`, `cne`, `filiere`,`email`, `nom_entreprise`, `adress_entreprise`, `telephone`, `telecopie`, `nature`, `nom_representant`)
   VALUES ('$_POST[nom]','$_POST[prenom]', '$_POST[apoge]', '$_POST[cne]' ,'$_POST[filiere]','$_POST[email]','$_POST[nom_entreprise]','$_POST[adress_entreprise]','$_POST[telephone]','$_POST[telecopie]','$_POST[nature]','$_POST[nom_representant]')";
}


if($choix = 'releve') {

  $query1 ="INSERT INTO `archive_rel`(`apogee`, `filiere`,`nom`,`prenom`,`CNE`,`email` ) 
  VALUES ('$_POST[apoge]', '$_POST[filiere]' ,'$_POST[nom]','$_POST[prenom]',  '$_POST[cne]' , '$_POST[email]')";
    mysqli_query($con,$query2);
  $query2 ="INSERT INTO `demanderel`(`apogee`, `filiere`,`nom`,`prenom`,`CNE`,`email` ) 
  VALUES ('$_POST[apoge]', '$_POST[filiere]' ,'$_POST[nom]','$_POST[prenom]',  '$_POST[cne]' , '$_POST[email]')";
      mysqli_query($con,$query1);
    mysqli_query($con,$query2);

}


if(mysqli_query($con,$query2))
{
    //if means that if this query exectued successfully
    header("location: index.php?success=added");
}
else{
    header("location: index.php?alert=add_failed");
}


}else {
  echo "<script> alert('invalid information please verify and try again')</script>";
  
}
}

}



?>