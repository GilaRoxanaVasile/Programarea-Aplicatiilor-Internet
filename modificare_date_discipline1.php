<?php
if(!isset($_POST['submit_form'])){
?>
<form method="POST" action="http://localhost/modificare_date_discipline1.php">
    <table border="3" align="center" bgcolor="silver">
        <tr>
            <td>Cod disciplina:<input type="text" name="codD_form"></td>
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

   $cod=$_POST['codD_form'];

   $query=mysqli_query($con, "select * from discipline where codDisciplina='$cod'");

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
?>

<br><hr>

<form method="POST" action="http://localhost/modificare_date_discipline2.php">
   <input type="hidden" name="codD2_form" value="<?php echo $sir[0]; ?>">
   <table>
       <tr>
           <td>
               <input type="text" name="codD1_form" value="<?php echo $sir[0]; ?>">
               <input type="text" name="disc1_form" value="<?php echo $sir[1]; ?>">
               <input type="text" name="an1_form" value="<?php echo $sir[2]; ?>">
           </td>
       </tr>
       <tr>
           <td>
               <input type="SUBMIT" value="Modifica">
           </td>
       </tr>
   </table>
</form>

<a HREF="http://localhost/modificare_date_discipline.html"> Renunt si revin... </a>

<?php
}
else
{
die("Nu gasesc nici o intregistrare... ");
}
mysqli_close($con);
}    
?>
