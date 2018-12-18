<?php

require_once('../db_configuration.php');

//PAGRINDINE TAISYKLE: pries ka nors leidziant tvarkyti DB butina viska patikrinti ir imtis visu saugumo priemoniu

if(!isset($_POST['updateRecord'])){
	header('Location:listBooks.php');
	die(); //die reikalingas atvejams, jei nesuveiktu nukreipimas atgal ir listBooks	
} else {
	if (!isset($_POST['id'])){
	header('Location:listBooks.php');
	die(); 		
	} else {
		$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT); //isfiltruojam ir patikrinam kad id tikrai numeris
		$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
		$author = filter_var($_POST['author'], FILTER_SANITIZE_STRING);
		$genre = filter_var($_POST['genre'], FILTER_SANITIZE_STRING);
		$height = filter_var($_POST['height'], FILTER_SANITIZE_NUMBER_INT);
		$publisher = filter_var($_POST['publisher'], FILTER_SANITIZE_STRING);
		
		// priskyre ir patikrine kintamuosius pradedam uzklausos formulavima ir vykdyma:
		
		$sql = "UPDATE books 
				SET 
				Title = :title,
				Author = :author,
				Genre = :genre,
				Height = :height,
				Publisher = :publisher
				WHERE id = :id
				";
			
		$result = $db_connection->prepare($sql); //paruosiam vykdymui ir issaugom rezultata, nes kitaip duomenu negrazins
		
		//vykdom:
		
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
	
	
	
$db_connection = NULL;
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<title>Update</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> <!--this is the link for using a little bit bootstrap-->

	</head>
	<body>
	<br>
		<div class = "container">
			<?php if($result -> execute()){?>
				<div class="alert alert-primary" role="alert">
					<?php echo "Record " . $id . " has been updated."; ?>
				</div> 
			
			<?php }	
				else { ?>
				<div class="alert alert-primary" role="alert">
				Record has not been updated.
				</div>
			<?php
			}	?>				
		</div>	
	</body>
</html>