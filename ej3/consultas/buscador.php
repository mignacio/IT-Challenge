
<?php
  if ($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!empty($_GET['legajo'])){
      $legajo = $_GET['legajo'];
			//No puedo usar * porque tendría columnas "identificador" duplicadas. Entonces uso alumno.identificador e idpersona
      $sql = "SELECT alumno.identificador, tipodoc, documento, nombre, apellido, fechanac, direccion, idpersona, legajo FROM (persona
      INNER JOIN alumno ON alumno.idpersona = persona.identificador)
      WHERE alumno.legajo = $legajo";

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
						$idpersona = $row['idpersona'];
						$idalumno = $row['identificador'];
        }else{
					echo "No se encuentra al alumno con el legajo: ". $legajo . "<br>";
					echo '<a href="editar_alumno.php">Volver a Editar</a>';
					die;
				}
      }
    }else{
			header ("Location: editar_alumno.php");
			die("Ingrese Legajo.");
    }
  }
?>

<?php
	include __DIR__ . '/../head.php';
?>
<body>

<div>
  <div class="form">
		<a href="editar_alumno.php">Volver a Editar</a><br><br>
		<form class="login-form" name="form2" method="POST" action="guardar_alumno.php">

		  <input type="text" value="<?php echo $tipodoc; ?>" name="tipodoc" maxlength="5"/><br><br>

		  <input type="text" value="<?php echo $documento; ?>" name="documento" maxlength="20"/><br><br>

		  <input type="text" value="<?php echo $nombre; ?>" name="nombre" maxlength="20"/><br><br>

		  <input type="text" value="<?php echo $apellido; ?>" name="apellido" maxlength="20"/><br><br>

		  <input type="text" value="<?php echo $fechanac; ?>" name="fechanac" maxlength="20"/><br><br>

		  <input type="text" value="<?php echo $direccion; ?>" name="direccion" maxlength="20"/><br><br>

		  <input type="text" value="<?php echo $legajo; ?>" name="legajo" maxlength="20"/><br><br>

			<input type="hidden" value="<?php echo $idpersona; ?>" name="idpersona">

			<input type="hidden" value="<?php echo $idalumno; ?>" name="idalumno">

		  <input id="boton" type="submit" name="submit1" value="Editar">
		</form>
  </div>
</div>
</body>
</html>
