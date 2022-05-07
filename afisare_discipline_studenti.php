<?php
    $con=mysqli_connect("127.0.0.1","root","","facultate2") or die("Nu se poate conecta la serverul MySQL");
    $query=mysqli_query($con,"select a.marca, a.nume, a.prenume, a.an_studiu , b.disciplina,
    c.nota from studenti_ac a, discipline b, note c where
    a.marca=c.marca and b.codDisciplina=c.codDisciplina order by a.an_studiu desc,
    a.marca");
    $nr=@mysqli_num_rows($query);
        if($nr>0){

            echo "<table align='center' border='1'>";
            echo "<tr bgcolor='silver'>";
            echo "<th>Marca</th>";
            echo "<th>Nume</th>";
            echo "<th>Prenume</th>";
            echo "<th>An studiu</th>";
            echo "<th>Disciplina</th>";
            echo "<th>Nota</th>";
            echo "</tr>";

            while($row = mysqli_fetch_row($query)){
            echo "<tr>";
            foreach($row as $value)
                {
                    echo "<td>$value</td>";
                }
            echo"</tr>";
            }
            
            echo "<br>";
            echo "<center>";
            echo "S-au gasit " . $nr . " inregistrari!";
            echo "</center>";
            
        }
        else
        die("Nu gasesc nici o intregistrare...");
    mysqli_close($con);
?>