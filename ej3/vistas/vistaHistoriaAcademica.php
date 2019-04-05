<?php
	include __DIR__ . '/../head.php';
?>
<body>
	<div>
		<a href="../index.php">Menú</a><br>
		<?php
			require_once __DIR__ . '/../dibujarFilas.php';
			$tableName = 'historia_academica';
			$primerColumna = 'idalumno';

			include __DIR__ . "/../defines.php";
			$sql = "SHOW COLUMNS FROM $tableName";
			$result = mysqli_query($mysqli, $sql);

			while($x = mysqli_fetch_assoc($result)){
				$fields[] = $x['Field'];
			}

			echo "<table id='tablaDatos'><tr>";
			foreach($fields as $f){
				echo "<th>$f</th>";
			}
			echo "</tr>";

			$sql = "SELECT * FROM $tableName ORDER BY $primerColumna DESC";

			if ($result=mysqli_query($mysqli,$sql))
			{
				dibujarFilas($result);				
				mysqli_free_result($result);
			}else{
				echo mysqli_error($mysqli);
			}
			echo "</table>";
			mysqli_close($mysqli);
		?>
	</div>
</body>
</html>
