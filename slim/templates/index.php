<!DOCTYPE html>
<html>
<head>
	<title>Empleados</title>
</head>
<body>
	<input type="text" name="search" placeholder="Search by email..." /><br>
	<table>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Position</th>
			<th>Salary</th>
		</tr>
	    <?php

	    foreach ($empleados as $empleado):
	        echo '<tr>';
	        	echo '<td><a href="'.$empleado['id'].'">'.$empleado['name'].'</a></td>';
	        	echo '<td>'.$empleado['email'].'</td>';
	        	echo '<td>'.$empleado['position'].'</td>';
	        	echo '<td>'.$empleado['salary'].'</td>';
	        echo '</tr>';
	    endforeach;
	    ?>
	</table>

</body>
</html>
