<?php
    $con=mysqli_connect("127.0.0.1","root","","facultate2") or die("Nu se poate conecta la serverul MySQL");
    $query=mysqli_query($con,"select a.codDisciplina, a.disciplina,a.an_studiu, count(*) as
    nr_studenti from discipline a, note b where
    a.codDisciplina=b.codDisciplina group by a.codDisciplina, a.disciplina, a.an_studiu
    order by a.an_studiu");
    $nr=@mysqli_num_rows($query);
        if($nr>0){

            echo "<table align='center' border='1'>";
            echo "<tr bgcolor='silver'>";
            echo "<th>Cod disciplina</th>";
            echo "<th>Disciplina</th>";
            echo "<th>An studiu</th>";
            echo "<th>Numar studenti</th>";
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