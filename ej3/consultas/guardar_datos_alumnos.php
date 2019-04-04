<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "datos guardados";
    if(!empty($_POST['legajo'])){
    }
    /*
    $tipodoc = $row['tipodoc'];
    $documento = $row['documento'];
    $nombre = $row['nombre'];
    $apellido = $row['apellido'];
    $fechanac = $row['fechanac'];
    $direccion = $row['direccion'];
    $legajo = $row['legajo'];

    $sql = "UPDATE alumno
    SET legajo = $legajo
    WHERE CustomerID = 1";

      include __DIR__ . "/../defines.php";
      if($result=mysqli_query($mysqli,$sql)){
        if(mysqli_num_rows($result) !== 0){
            $row=mysqli_fetch_assoc($result);
            $tipodoc = $row['tipodoc'];
            $documento = $row['documento'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $fechanac = $row['fechanac'];
            $direccion = $row['direccion'];
            $legajo = $row['legajo'];

            include __DIR__ . '/buscador.php';
        }
      }

  }else{
    echo "Por favor ingrese un legajo existente.";
    */
  }else{

  }

?>
