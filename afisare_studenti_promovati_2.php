<?php
    $con=mysqli_connect("127.0.0.1","root","","facultate2") or die("Nu se poate conecta la serverul MySQL");
    $query=mysqli_query($con,"select B.disciplina, B.an_studiu, count(*) as nr from discipline B, note C 
    where B.codDisciplina=C.codDisciplina and C.nota>=5 group by B.codDisciplina having count(*)>=2 order by B.disciplina");
    $nr=@mysqli_num_rows($query);
        if($nr>0){

            echo "<table align='center' border='1'>";
            echo "<tr bgcolor='silver'>";
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
            
        }
        else
        die("Nu gasesc nici o intregistrare...");
    mysqli_close($con);
?>