<?php

require_once('../db_configuration.php');

if(!isset($_GET['id'])){
	header('Location:listBooks.php');
	die(); //atvejams, kai nenustatytas id, nera numerio
}else {
	$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
	if(!$id){
	header('Location:listBooks.php');
	die();	//atvejams, kai panaudojus filter_var funkcija nustatoma, kad id - ne skaicius
	} else {		
		echo "<br>";
		$sql = 'DELETE FROM books where id = :id LIMIT 1'; 
		$result = $db_connection->prepare($sql);
		$result -> execute(['id' => $id]);
		$rowsDeleted = $result -> rowCount();
	} 	
}
?>

<!DOCTYPE html>
<html lang = "en">
	<head>
		<meta charset = "UTF-8">
		<title>Delete</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> <!--this is the link for using a little bit bootstrap-->

	</head>
	<body>
	<br>
		<div class = "container">
			<?php if($rowsDeleted==1){?>
				<div class="alert alert-primary" role="alert">
					<?php echo "Record " . $id . " has been deleted."; ?>
				</div> 
			
			<?php }	
				else { ?>
				<div class="alert alert-primary" role="alert">
					<p>Record has not been deleted.</p>
				</div>
			<?php
			}	?>				
		</div>	
	</body>
</html>

<?php
/* PIRMINIS PRIMITYVUS KODAS
$id = $_GET['id'];

$sql = "Delete FROM books
		WHERE id = $id";

if($db_connection -> exec($sql)){
	echo "Record " . $id . " has been deleted";	
} else {
	echo "Failed";
}*/


?>