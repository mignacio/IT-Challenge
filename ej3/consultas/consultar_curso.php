<?php
	include __DIR__ . '/../head.php';
?>
<body>
<div>
  <div class="form">
		<a href="../index.php">Menú</a><br><br>
    <form class="login-form" name="form1" method="GET" action="">
      <input type="text" placeholder="idcurso" name="idcurso" maxlength="20"/><br><br>

      <input id="boton" type="submit" name="submit1" value="Ingresar"><br><br>
    </form>
  </div>
</div>
</body>
</html>

<?php
  include __DIR__ . '/../defines.php';

	if ($_SERVER['REQUEST_METHOD'] == 'GET'){
			if(empty($_GET['idcurso'])){
				die("Ingrese un número de Id de curso");
			}
			$idcurso = $_GET['idcurso'];
			$sql = "SELECT curso.nombre , carrera.nombre, COUNT(inscripciones_curso.idcurso), curso.cupomaximo, curso.iddocente
			FROM ((curso
			INNER JOIN carrera ON curso.idcarrera = carrera.identificador)
			INNER JOIN inscripciones_curso ON inscripciones_curso.idcurso = curso.identificador)
			WHERE curso.identificador = $idcurso
			GROUP BY curso.nombre, carrera.nombre, curso.cupomaximo;";

		  if ($result=mysqli_query($mysqli,$sql))
			{
				if(mysqli_num_rows($result)==0){
					echo "No se encuentra el curso con el id: ".$idcurso;
				}else{
					echo "<table id='tablaDatos'>";
					echo "<tr><th>Curso</th><th>Carrera</th><th>Inscriptos</th><th>Cupo Máximo</th><th>idocente</th></tr>";
					while ($row=mysqli_fetch_row($result))
			    {
			      echo "<tr>";
			      foreach($row as $key => $value){
			        echo "<td>".$value."</td>";
			      }
			      echo "</tr>";
			    }
			    echo "</table>";
				}
		  }else{
		    echo mysqli_error($mysqli);
		  }
			mysqli_free_result($result);
		  mysqli_close($mysqli);
	}
	?>
