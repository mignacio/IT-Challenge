<!DOCTYPE html>
<html>
<head>
	<!-- <meta http-equiv="refresh" content="100"> -->
	<!-- <link rel="stylesheet" type="text/css" href="../css/style.css"> -->
</head>
<body>
	<A HREF = ../index.php>Menu</A><br>
	<style>
		#tablaDatos {
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		#tablaDatos td, #tablaDatos th {
			border: 1px solid #ddd;
			padding: 8px;
		}

		#tablaDatos tr:nth-child(even){background-color: #f2f2f2;}

		#tablaDatos tr:hover {background-color: #ddd;}

		#tablaDatos th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #00A8A9;
			color: white;
		}
	</style>

	<div id="cards" class="cards">
		<?php
			$tableName = 'curso';
			$primerColumna = 'identificador';
			include('defines.php');
			$sql = "SHOW COLUMNS FROM $tableName";
			$result = mysqli_query($mysqli, $sql);

			while($x = mysqli_fetch_assoc($result)){
				$fields[] = $x['Field'];
			}

			echo "<TABLE id='tablaDatos'>";
			echo "<TR>";
			foreach($fields as $f){
				echo "<TH>".$f."</TH>";
			}
			echo "</TR>";

			$sql = "SELECT * FROM $tableName ORDER BY $primerColumna DESC";

			if ($result=mysqli_query($mysqli,$sql))
			{
				while ($row=mysqli_fetch_row($result))
				{
					echo "<TR>";
					foreach($row as $key => $value){
						echo "<TD>".$value."</TD>";
					}
					echo "</TR>";
				}
				echo "</TABLE>";
				// Free result set
				mysqli_free_result($result);
			}else{
				echo $result->$error;
			}
			mysqli_close($mysqli);
		?>
	</div>
</body>
</html>
