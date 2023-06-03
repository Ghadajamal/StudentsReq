<?php
require("connection.php");
include("session.php");

if(isset($_POST['submit'])){
   if(empty($_POST['email'])){
    $email = null;
    $flag = false;
   }else {
    $email = $_POST['email'];
    $flag=true;
   }
   if(empty($_POST['password'])){
    $password = null;
    $flag = false;
   }else {
    $password = $_POST['password'];
    $flag = true;
   }

  if($flag){
        $query=" SELECT * FROM `admin` WHERE `email`='".$email."' AND `password`='".$password."' ";
        $result=mysqli_query($con,$query);
        $r=mysqli_fetch_assoc($result);


        if(!empty($r['userid'])){
            session_start();
           $_SESSION['userid']=$r['userid'];
            $_SESSION['email']=$r['email'];
            header("Location: espace_admin.php");
        }else{
            echo "<script> alert(' invalid email or password')</script>";
        }
    }


}
?>

<!DOCTYPE html>

<html>
<head>
	<title>Authentification d'admin</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/9.svg">
		</div>
		<div class="login-content"> 
			<form  method="POST" action="login.php">
                <img src=" img/avatar.svg ">
				<h2 class="title">Connectez-vous </h2>
           		<div class="input-div one">
           		   <div class="i"> 
                    <i class= " fas fa-user " ></i>
           		   </div>    

                   <!--------first input----------->
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="text" class="input " name="email" >
           		   </div>
                   <!---------------------->

           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
                   <!-----------second input------------>
           		   <div class="div">
           		    	<h5>Mot de passe</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
                   <!----------------->
            	</div>
            	<a href="#">Mot de passe oublié?</a>

                <!------ the submit button-------->
            	<input type="submit" class="btn" value="Se connecter" name="submit">
                <!-------------------------------->
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>