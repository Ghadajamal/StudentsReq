<?php
require("connection.php");
require 'dompdf/autoload.inc.php';


// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();

$options->set('chroot',realpath(''));



$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM archive_conv WHERE id='$id' ");
$user = mysqli_fetch_assoc($sql);

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);
ob_start();
require('convention_pdf.php');//attestation.php
$html = ob_get_contents();
ob_get_clean();


$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('convention.pdf',['Attachement'=>false] );