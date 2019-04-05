<?php
	include __DIR__ . '/../head.php';
?>
<body>

<div>
  <div class="form">
		<a href="../index.php">Menú</a><br><br>
    <form class="login-form" name="form1" method="POST" action="inscripcion_materia.php">
      <input type="text" placeholder="legajo" name="legajo" maxlength="20"/><br><br>

			<input type="text" placeholder="idmateria" name="idmateria" maxlength="20"/><br><br>

      <input id="boton" type="submit" name="submit1" value="Inscribirse">
    </form>
  </div>
</div>
</body>
</html>

<?php
  include __DIR__ . '/../defines.php';

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			if(empty($_POST['legajo'])){
				die("Ingrese un Legajo");
			}else if(empty($_POST['idmateria'])){
				die("Ingrese un Id de materia");
			}
			$legajo = $_POST['legajo'];
			$idmateria = $_POST['idmateria'];

			$sql = "SELECT identificador FROM alumno WHERE legajo = $legajo";

		  if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)===0){
					echo "No se encontró al alumno con el legajo: ".$legajo."<br>";
					echo 'Desea <a href="ingresar_alumno.php">inscribirse?</a>';
					mysqli_free_result($result);
				  mysqli_close($mysqli);
					die;
				}else{
					$row=mysqli_fetch_row($result);
					$idalumno = $row[0];
				}
		  }else{
		    echo mysqli_error($mysqli);
		  }

			$sql = "SELECT identificador FROM curso WHERE identificador = $idmateria";

			if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)===0){
					echo "No se encontró a la materia con el id: ".$idmateria;
					mysqli_free_result($result);
				  mysqli_close($mysqli);
					die;
				}
		  }

			$sql = "SELECT * FROM inscripciones_curso WHERE (idalumno = $idalumno AND idcurso = $idmateria)";

			if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)!==0){
					echo "Ya está inscripto en esta materia";
					mysqli_free_result($result);
				  mysqli_close($mysqli);
					die;
				}
		  }

			$sql = "INSERT INTO inscripciones_curso (idalumno, idcurso, fechainscripcion) VALUES ($idalumno, $idmateria, CURRENT_TIMESTAMP)";
			if ($result=mysqli_query($mysqli,$sql))
			{
				echo "Inscripción exitosa";
		  }else{
		    echo mysqli_error($mysqli);
		  }
			mysqli_close($mysqli);
	}
	?>
