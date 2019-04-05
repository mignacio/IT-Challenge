<?php
	include __DIR__ . '/../head.php';
?>
<body>
<div>
  <div class="form">
		<a href="../index.php">Menú</a><br><br>
    <form class="login-form" name="form1" method="GET" action="">
      <input type="text" placeholder="legajo" name="legajo" maxlength="20"/><br><br>

      <input id="boton" type="submit" name="submit1" value="Ingresar"><br><br>
    </form>
  </div>
</div>
</body>
</html>

<?php
	require_once __DIR__ . '/../dibujarFilas.php';
  include __DIR__ . '/../defines.php';

	if ($_SERVER['REQUEST_METHOD'] == 'GET'){
			if(empty($_GET['legajo'])){
				die("Ingrese un legajo");
			}
			$legajo = $_GET['legajo'];

			//Muestro Carreras
			echo "<h1>Carreras:</h1>";
			$sql = "SELECT carrera.nombre, inscripciones_carrera.fechainscripcion FROM ((carrera
			INNER JOIN inscripciones_carrera  ON carrera.identificador = inscripciones_carrera.idcarrera)
			INNER JOIN alumno ON inscripciones_carrera.idalumno = alumno.identificador)
			WHERE alumno.legajo = $legajo";

		  if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)==0){
					echo "El alumno con el legajo: ".$legajo." No está inscripto en una carrera";
				}else{
					echo "<table id='tablaDatos'>";
					echo "<tr><th>Carrera</th><th>Fecha Inscripcion</th></tr>";
					dibujarFilas($result);
			    echo "</table>";
				}
				mysqli_free_result($result);
		  }else{
		    echo mysqli_error($mysqli);
		  }

			//Muestro Cursos
			echo "<h1>Cursos Inscriptos:</h1>";
			$sql = "SELECT curso.descripcion, curso.idcarrera, inscripciones_curso.fechainscripcion FROM ((curso
			INNER JOIN inscripciones_curso  ON curso.identificador = inscripciones_curso.idcurso)
			INNER JOIN alumno ON inscripciones_curso.idalumno = alumno.identificador)
			WHERE alumno.legajo = $legajo";

		  if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)==0){
					echo "El alumno con el legajo: ".$legajo." No está inscripto en un curso";
				}else{
					echo "<table id='tablaDatos'>";
					echo "<tr><th>Curso</th><th>id Carrera</th><th>Fecha Inscripcion</th></tr>";
					dibujarFilas($result);
			    echo "</table>";
				}
		  }else{
		    echo mysqli_error($mysqli);
		  }
			echo "<h1> Promedio por Carrera:</h1>";
			$sql = "SELECT carrera.nombre, AVG(nota) FROM
			((historia_academica
			INNER JOIN carrera ON historia_academica.idcarrera = carrera.identificador)
			INNER JOIN alumno ON historia_academica.idalumno = alumno.identificador)
			WHERE legajo = $legajo GROUP BY carrera.nombre";

			if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)==0){
					echo "El alumno con el legajo: ".$legajo.". No tiene exámenes rendidos.";
				}else{
					echo "<table id='tablaDatos'>";
					echo "<tr><th>Curso</th><th>id Carrera</th></tr>";
					dibujarFilas($result);
			    echo "</table>";
				}
		  }else{
		    echo mysqli_error($mysqli);
		  }

			mysqli_free_result($result);
		  mysqli_close($mysqli);
	}
	?>
