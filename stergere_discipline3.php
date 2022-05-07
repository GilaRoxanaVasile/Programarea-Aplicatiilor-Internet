<?php
if(!isset($_POST['submit_form'])){
?>
<form method="POST" action="http://localhost/stergere_discipline3.php">
<table border="3" align="center" bgcolor="silver">
    <tr>
        <td> Nume disciplina: </td>
        <td> <input type="text" name="numeD"></td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="SUBMIT" name="submit_form" value="Sterge">
            <input type="RESET" value="Anuleaza">
        </td>    
    </tr>
</table>
</form>
<?php
}
else
{
    $con=mysqli_connect("localhost","root","","facultate2") or die("Nu se poate conecta la serverul MySQL");

    $disc=$_POST['numeD'];

    $query=mysqli_query($con,"select count(*) from discipline where disciplina='$disc'");
    $row=mysqli_fetch_row($query);
    $nr=$row[0];

    if($nr!=0)
    {
        $query1=mysqli_query($con,"delete from discipline where disciplina='$disc'") or die("Stergerea nu a putut avea loc!".mysqli_error($con));
        echo"<center>";
        echo"Stergerea a fost realizata cu succes!";
        echo"</center>";
    }
    else{
        echo"<center>";
        echo"Disciplina nu exista in baza de date!";
        echo"</center>";
    }
    header("Location:afisare_discipline.php");
mysqli_close($con);
}    
?>
