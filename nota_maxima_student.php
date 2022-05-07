<?php
if(!isset($_POST['submit_form'])){
?>
<form method="POST" action="http://localhost/nota_maxima_student.php">
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

   $query=mysqli_query($con, "select A.marca,A.nume,A.prenume,A.an_studiu,
   B.disciplina,max(C.nota) as maxim from studenti_ac A,
   discipline B, note C where A.marca=C.marca and B.codDisciplina=C.codDisciplina
   and A.marca='$marca_form';");

   $nr1=mysqli_num_rows($query);

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

   $nr2=0;
   while($row=mysqli_fetch_row($query)){
       echo"<tr>";
       foreach($row as $value){
           echo "<td bcolor='yellow'> $value </td>";
           $sir[$nr2]=$value;
           $nr2++;
       }
       echo"</tr>";
   }
   echo"</table>";
  }
else
{
die("Nu gasesc nici o intregistrare... ");
}
mysqli_close($con);
}    
?>