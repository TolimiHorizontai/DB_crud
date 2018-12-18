<?php

require_once('../db_configuration.php');

$sql = 'SELECT * FROM books';

$results = $db_connection->query($sql);

?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<title>List of books</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> <!--this is the link for using a little bit bootstrap-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> <!--this is the link for using an icon of edit-->
	</head>
	<body>
		<div class = "container">
			<table class = "table">
				<thead>
					<tr>
						
						<th>Title</th>
						<th>Author</th>
						<th>Genre</th>
						<th>Publisher</th>	
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>		
				<tbody>
				<?php
					foreach($results as $result){
				?>
					<tr>
						<td><?php echo $result['Title']; ?></td>
						<td><?php echo $result['Author']; ?></td>
						<td><?php echo $result['Genre']; ?></td>
						<td><?php echo $result['Publisher']; ?></td>
						<td>
							<a href="edit.php?id=<?php echo $result['id'];?>">
							<i class="fas fa-edit"></i>
						</a>
						</td>
						<td>
							<a href="delete.php?id=<?php echo $result['id'];?>">
							<i class="fas fa-trash-alt"></i>
						</a>
						</td>
					</tr>
					
				<?php
					}
				?>
				</tbody>
			</table>		
		</div>	
	</body>
</html>