<?php
include('config.php');
require 'autoload.inc.php';
use Dompdf\Dompdf;


$id = $_GET['id'];
//echo "hello ".$id;
//$sql = mysqli_query($con, "SELECT * FROM Module WHERE ID_MODULE='$id'");
$sql = mysqli_query($con, "SELECT * FROM Notes INNER JOIN demanderel ON Notes.apogee = demanderel.apogee INNER JOIN Module ON Notes.ID_module=Module.ID_module where demanderel.apogee='$id'");
//$sql = mysqli_query($con, "SELECT * FROM Notes INNER JOIN Etudiant ON Notes.apogee = Etudiant.apogee INNER JOIN Module ON Notes.ID_module=Module.ID_module");
//echo("<script type='text/javascript'> var answer = prompt('".$_GET['ID_module']."'); </script>");
$user = mysqli_fetch_assoc($sql);



//instanciation 
$dompdf= new Dompdf();
ob_start();
require('pdf.php');
$html=ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('details.pdf', ['Attachement'=>false]);
?>
