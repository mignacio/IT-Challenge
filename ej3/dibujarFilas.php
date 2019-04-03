<?php
function dibujarFilas($result) {
  while ($row=mysqli_fetch_row($result))
  {
    echo "<tr>";
    foreach($row as $key => $value){
      echo "<td>".$value."</td>";
    }
    echo "</tr>";
  }
}
?>
