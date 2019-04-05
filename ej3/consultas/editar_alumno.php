<?php
	include __DIR__ . '/../head.php';
?>
<body>

<div>
  <div class="form">
		<a href="../index.php">Menú</a><br><br>
		<form class="login-form" name="form1" method="GET" action="buscador.php">
			<input type="text" placeholder="legajo" name="legajo" maxlength="20"/><br><br>
			<input id="boton" type="submit" name="submit1" value="Buscar"><br><br>
		</form>
  </div>
</div>
</body>
</html>
