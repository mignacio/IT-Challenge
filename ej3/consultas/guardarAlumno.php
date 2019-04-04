<?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    echo "datos guardados";
    if(!empty($_POST['legajo'])){
      $tipodoc = $_POST['tipodoc'];
      $documento = $_POST['documento'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $fechanac = $_POST['fechanac'];
      $direccion = $_POST['direccion'];
      $legajo = $_POST['legajo'];
      $idpersona = $_POST['idpersona'];
      $idalumno = $_POST['idalumno'];

      $sql = "UPDATE alumno
      SET legajo = $legajo
      WHERE  identificador = $idalumno";

      include __DIR__ . "/../defines.php";
      $result=mysqli_query($mysqli,$sql);
      if($result === false){
            echo '<a href="../index.php.php">Volver a Menu</a><br>';
            die(mysqli_error($mysqli));
      }

      $sql = "UPDATE persona
      SET tipodoc = '$tipodoc', documento = $documento,
      nombre = '$nombre', apellido = '$apellido', fechanac = '$fechanac', direccion = '$direccion'
      WHERE identificador = $idpersona";      

      $result=mysqli_query($mysqli,$sql);
      if($result === false){
            die(mysqli_error($mysqli));
      }else{
        echo "Datos Guardados<br>";
        echo '<a href="../index.php">Volver a Menu</a>';
        die;
      }

    }else{
      echo '<a href="editar_alumno.php">Volver a Buscar</a><br>';
      echo "Por favor ingrese legajo.";
      die;
    }

  }else{
    header ("Location: editar_alumno.php");
    die;
  }
?>
