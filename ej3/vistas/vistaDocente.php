<?php
	include __DIR__ . '/../head.php';
?>
<body>
	<div id="cards" class="cards">
		<a href="../index.php">Menú</a><br>
		<?php
			$tableName = 'docente';
			$primerColumna = 'identificador';

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
				while ($row=mysqli_fetch_row($result))
				{
					echo "<tr>";
					foreach($row as $key => $value){
						echo "<td>$value</td>";
					}
					echo "</tr>";
				}
				// Free result set
				mysqli_free_result($result);
			}else{
				echo $result->$error;
			}
			echo "</table>";
			mysqli_close($mysqli);
		?>
	</div>
</body>
</html>
