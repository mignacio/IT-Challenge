<?php
  include('defines.php');
  $sql = "SHOW COLUMNS FROM $tableName";
  $result = mysqli_query($mysqli, $sql);

  while($x = mysqli_fetch_assoc($result)){
    $fields[] = $x['Field'];
  }

  echo "<TABLE>";
  echo "<TR>";
  foreach($fields as $f){
    echo "<TH>".$f."</TH>";
  }
  echo "</TR>";

  $sql = "SELECT * FROM $tableName ORDER BY $primerColumna DESC";

  if ($result=mysqli_query($mysqli,$sql))
  {
    while ($row=mysqli_fetch_row($result))
    {
      echo "<TR>";
      foreach($row as $key => $value){
        echo "<TD>".$value."</TD>";
      }
      echo "</TR>";
    }
    echo "</TABLE>";
    // Free result set
    mysqli_free_result($result);
  }else{
    echo $result->$error;
  }
  mysqli_close($mysqli);
