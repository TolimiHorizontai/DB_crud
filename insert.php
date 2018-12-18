<?php

require_once('../db_configuration.php');



if(!isset($_POST['insertRecord'])){
	header('Location:edit.php');
	die(); //die reikalingas atvejams, jei nesuveiktu nukreipimas atgal ir listBooks	
	} else {
	if (empty($_POST['id']) || empty($_POST['title']) || empty($_POST['author']) || empty($_POST['genre']) || empty($_POST['height']) || empty($_POST['publisher'])){
	header('Location:edit.php');
	die(); 		
	} else {
		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); //isfiltruojam ir patikrinam kad id tikrai numeris
		$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
		$author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
		$genre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);
		$height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_INT);
		$publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_STRING);
		
		$sql = "INSERT INTO books 
				SET 
				id = :id,
				Title = :title,
				Author = :author,
				Genre = :genre,
				Height = :height,
				Publisher = :publisher
				";
				
		$result = $db_connection->prepare($sql);
		
		$result -> execute([
			'id'			=> $id,
			'title'			=> $title,
			'author'		=> $author,
			'genre'			=> $genre,	
			'height'		=> $height,
			'publisher'		=> $publisher
		]);				
	}		
}	
		$rowsAdded = $result -> rowCount();	
		
	
$db_connection = NULL;
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<title>Insert</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> <!--this is the link for using a little bit bootstrap-->

	</head>
	<body>
	<br>
		<div class = "container">
			<?php if($rowsAdded==1){?>
				<div class="alert alert-primary" role="alert">
					<?php echo "Record No " . $id . " has been inserted."; ?>
				</div> 
			
			<?php }	
				else { ?>
				<div class="alert alert-primary" role="alert">
				Record has not been inserted.
				</div>
			<?php
			}	?>				
		</div>	
	</body>
</html>