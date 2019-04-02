<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Ingresar Alumno</title>
</head>
<body>

<div class="login-page">
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
	$uname = "";
	$pword = "";
	$errorMessage = "";

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		$uname = $_POST['legajo'];
		$pword = $_POST['materia'];

		include('defines.php');

	}
?>
