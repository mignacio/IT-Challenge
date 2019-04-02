<?php
	include('../head.php');
?>
<body>

<div class="login-page">
  <div class="form">
		<a href="../index.php">Menú</a><br><br>
    <form class="login-form" name="form1" method="POST" action="login.php">
      <input type="text" placeholder="identificador" name="id" maxlength="20"/><br><br>

			<input type="text" placeholder="tipodoc" name="tipodoc" maxlength="5"/><br><br>

			<input type="text" placeholder="documento" name="doc" maxlength="20"/><br><br>

			<input type="text" placeholder="nombre" name="nombre" maxlength="20"/><br><br>

			<input type="text" placeholder="apellido" name="apellido" maxlength="20"/><br><br>

			<input type="text" placeholder="fechanac" name="fechanac" maxlength="20"/><br><br>

			<input type="text" placeholder="direccion" name="direccion" maxlength="20"/><br><br>

      <input id="boton" type="submit" name="submit1" value="Ingresar">
      <!--p class="message">No estoy registrado <a href="signup.php">Crear una cuenta</a></p-->
    </form>
  </div>
</div>
</body>
</html>
