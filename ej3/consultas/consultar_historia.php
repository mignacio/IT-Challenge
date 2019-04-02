<?php
	include('../head.php');
?>
<body>

<div class="login-page">
  <div class="form">
		<a href="../index.php">Menú</a><br><br>
    <form class="login-form" name="form1" method="POST" action="login.php">
      <input type="text" placeholder="legajo" name="legajo" maxlength="20"/><br><br>

      <input id="boton" type="submit" name="submit1" value="Consultar">

    </form>
  </div>
</div>
</body>
</html>
