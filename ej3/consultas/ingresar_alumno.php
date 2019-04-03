<?php
	include __DIR__ . '/../head.php';
?>
<body>

<div class="login-page">
  <div class="form">
		<a href="../index.php">Menú</a><br><br>
    <form class="login-form" name="form1" method="POST" action="">
      <input type="text" placeholder="idpersona" name="idpersona" maxlength="20"/><br><br>

			<input type="text" placeholder="idalumno" name="idalumno" maxlength="20"/><br><br>

			<input type="text" placeholder="tipodoc" name="tipodoc" maxlength="5"/><br><br>

			<input type="text" placeholder="documento" name="doc" maxlength="20"/><br><br>

			<input type="text" placeholder="nombre" name="nombre" maxlength="20"/><br><br>

			<input type="text" placeholder="apellido" name="apellido" maxlength="20"/><br><br>

			<input type="text" placeholder="fechanac" name="fechanac" maxlength="20"/><br><br>

			<input type="text" placeholder="direccion" name="direccion" maxlength="20"/><br><br>

			<input type="text" placeholder="legajo" name="legajo" maxlength="20"/><br><br>

      <input id="boton" type="submit" name="submit1" value="Ingresar">
      <!--p class="message">No estoy registrado <a href="signup.php">Crear una cuenta</a></p-->
    </form>
  </div>
</div>
</body>
</html>

<?php
  include __DIR__ . '/../defines.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$idpersona = $_POST['idpersona'];
			$idalumno = $_POST['idalumno'];
			$tipodoc = $_POST['tipodoc'];
			$documento = $_POST['doc'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$fechanac = $_POST['fechanac'];
			$direccion = $_POST['direccion'];
			$legajo = $_POST['legajo'];

			$sql = "SELECT * FROM persona WHERE identificador = $idpersona";
			if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)!==0){
					echo "La persona con el identificador " . $idpersona . " ya existe. Intentando ingresar solo alumno.";
					mysqli_free_result($result);
				}
		  }else{
				echo "1" . mysqli_error ($mysqli) . "<br>";
				mysqli_free_result($result);

				$sql = "INSERT INTO persona (identificador, tipodoc, documento, nombre, apellido, fechanac, direccion)
				VALUES ($idpersona, $tipodoc, $documento, $nombre, $apellido, $fechanac, $direccion)";

			  if ($result=mysqli_query($mysqli,$sql))
				{
					echo "2". mysqli_error ($mysqli) . "<br>";
					mysqli_free_result($result);
					echo "Inscripción exitosa";
			  }else{
					echo "2". mysqli_error ($mysqli) . "<br>";
			  }
		  }

			$sql = "SELECT * FROM alumno WHERE identificador = $idalumno";
			if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)!==0){
					echo "El alumno con el identificador " . $idpersona . " ya existe. Desea editar?.";
					mysqli_free_result($result);
				  mysqli_close($mysqli);
					die;
				}
		  }else{
				echo "3" . mysqli_error ($mysqli) . "<br>";
				mysqli_free_result($result);
				$sql = "INSERT INTO alumno (identificador, idpersona, legajo)
					VALUES ($idalumno, $idpersona, $legajo)";

				if ($result=mysqli_query($mysqli,$sql))
				{
					echo "Inscripción exitosa";
				}else{
					echo "4" . mysqli_error ($mysqli) . "<br>";
				}
		  }
			//mysqli_free_result($result);
		  mysqli_close($mysqli);
	}
	?>
