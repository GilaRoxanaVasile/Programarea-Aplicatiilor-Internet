<?php
if(!isset($_POST['submit_form'])){
?>
<form method="POST" action="http://localhost/afisare_student_media.php">
    <table border="3" align="center" bgcolor="silver">
        <tr>
            <td>Marca student:<input type="text" name="marca_form"></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="SUBMIT"  name="submit_form" value="Cauta">
                <input type="RESET" value="Anuleaza">
            </td>
    </table>
</form>
<?php
}
else
{
    $con=mysqli_connect("localhost","root","","facultate2") or die("Nu se poate conecta la serverul MySQL");

   $marca_form=$_POST['marca_form'];

   $query=mysqli_query($con, "select B.disciplina, C.nota from discipline B, note C where
   B.codDisciplina=C.codDisciplina and C.marca='$marca_form'");

   $query2=mysqli_query($con, "select A.marca,A.nume,A.prenume,A.an_studiu from studenti_ac A where A.marca='$marca_form'");

   $nr1=mysqli_num_rows($query);
   $nr=mysqli_num_rows($query);

   if($nr>0){
    echo "<table align='center' border='1'>";
    echo "<tr bgcolor='silver'>";
    echo "<th>Marca</th>";
    echo "<th>Nume</th>";
    echo "<th>Prenume</th>";
    echo "<th>An studiu</th>";
    echo "</tr>";

    while($row = mysqli_fetch_row($query2)){
    echo "<tr>";
    foreach($row as $value)
        {
            echo "<td>$value</td>";
        }
    echo"</tr>";
    }
    
   if($nr1>0)
   {
       echo"<table border='2' align='center'>";
       echo"<tr bgcolor='silver'>";
       $col=mysqli_num_fields($query);
       for($i=0; $i<$col; $i++)
       {
           $var=mysqli_fetch_field_direct($query,$i);
           echo"<th>";
           echo $var->name;
           echo"</th>";
       }
       echo"</tr>";
 
   $media=0;
   $suma_note=0;
   $nr2=0;
   while($row=mysqli_fetch_row($query)){
       echo"<tr>";
       foreach($row as $value){
           echo "<td bcolor='yellow'> $value </td>";
           $sir[$nr2]=$value;
           $nr2++;
       }
       $suma_note+=$value;
       echo"</tr>";
   }
   echo"</table>";
   $nr2=$nr2/2;
   if($nr2>0) $media=$suma_note/$nr2;
   echo "<br>";
   echo "<center>";
   echo "Media notelor acestui student este " . $media . ".";
   echo "</center>";
  }
}
else
{
die("Nu gasesc nici o intregistrare... ");
}
mysqli_close($con);
}    
?>