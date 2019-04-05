<?php
/**
* @params $result espera un resultado de una consulta sql que devuelva filas
* dibuja en html cada una de las filas del resultado de la consulta
*/

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
