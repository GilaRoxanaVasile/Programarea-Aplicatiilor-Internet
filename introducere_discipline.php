<?php
if (!isset($_POST['submit_form'])){
?>
<form method="POST" action="http://localhost/introducere_discipline.php">
<table border="3" align="center" BGCOLOR="Silver">
    <tr>
        <td>Cod disciplina:</td>
        <td><input type="text" name="codD_form"></td>
    </tr>
    <tr>
        <td>Disciplina:</td>
        <td><input type="text" name="disciplina_form"></td>
    </tr>
    <tr>
        <td>An studiu:</td>
        <td>
            <select name="anS_form">
                <option value="1">An 1</option>
                <option value="2">An 2</option>
                <option value="3">An 3</option>
                <option value="4">An 4</option>
            </option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
        <input type="SUBMIT" name="submit_form" value="Adauga">
        <input type="RESET" value="Anuleaza">
        </td>
    </tr>
</table>
</form>
<?php
}
else{
$con=mysqli_connect("localhost","root","","facultate2") or die("Nu se poate conecta la serverul MySQL");
$codD=$_POST['codD_form'];
$disciplina=$_POST['disciplina_form'];
$anS=$_POST['anS_form'];

$query=mysqli_query($con, "select count(*) from discipline
where codDisciplina='$codD'");
$row=mysqli_fetch_row($query);
$nr=$row[0];
if ($nr==0){

$query1=mysqli_query($con,"insert into discipline values('$codD','$disciplina',$anS)") or die ("Inserarea
nu a putut avea loc!". mysqli_error($con));

header("Location:afisare_discipline.php");
}
else{
echo"<center>";
echo "Disciplina respectiva exista deja in baza de date!";
echo"</center>";
}
mysqli_close($con);
}
?>
