<?php
    $con=mysqli_connect("127.0.0.1","root","","magazin") or die("Nu se poate conecta la serverul MySQL");
    $nume_produs=$_POST['nume_produs_form'];
    $query=mysqli_query($con,"select * from produse where nume_produs='$nume_produs'");
    $nr=@mysqli_num_rows($query);
        if($nr>0){
            echo "<center>";
            echo "S-au gasit " . $nr . " inregistrari.";
            echo "</center>";

            echo "<table align=’center’ border='1'>";
            echo "<tr bgcolor=’silver’>";
            echo "<th>ID</th>";
            echo "<th>Nume produs</th>";
            echo "<th>Pret</th>";
            echo "<th>Cantitate</th>";
            echo "<th>Pret*Cantitate</th>";
            echo "</tr>";

            while($row = mysqli_fetch_row($query)){
            echo "<tr>";
            foreach($row as $value)
                {
                    echo "<td>$value</td>";
                }
            $prod=$row[2]*$row[3];
            echo"<td>$prod</td>";
            echo"</tr>";
            }
        }
        else
        die("Nu gasesc nici o intregistrare...");
    mysqli_close($con);
?>