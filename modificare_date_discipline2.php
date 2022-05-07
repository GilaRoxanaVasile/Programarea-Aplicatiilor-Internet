<?php
$con=mysqli_connect("localhost","root","","facultate2") or die("Nu se poate conecta la server");

$codD2=$_POST['codD2_form'];

$codD1=$_POST['codD1_form'];
$disc1=$_POST['disc1_form'];
$an1=$_POST['an1_form'];

$query=mysqli_query($con,"update discipline set codDisciplina='$codD1', disciplina='$disc1', an_studiu='$an1' where codDisciplina='$codD2'") 
                    or die("Modificare esuata!".mysqli_error($con));

//echo "Ok, am modificat!";
header("Location:afisare_discipline.php");
mysqli_close($con);
?>