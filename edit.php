<?php

require_once('../db_configuration.php');

//kodas klaidu isvengimui ir saugumui nuo sql ataku

if(!isset($_GET['id'])){
	header('Location:listBooks.php');
	die(); //atvejams, kai nenustatytas id, nera numerio
}else {
	$id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
	if(!$id){
	header('Location:listBooks.php');
	die();	//atvejams, kai panaudojus filter_var funkcija nustatoma, kad id - ne skaicius
	} else {		
		
		$sql = 'SELECT * FROM books where id = :id LIMIT 1'; //dvitaskis padaro placeholder`i, galima tiesiog ir $id rasyti - tada tiesiog bus tuscias lauks, be placeholder`io
		$result = $db_connection->prepare($sql);
		$result -> execute(['id' => $id]);
		$result = $result -> fetch();		
	} //atvejai, kai id skaicius, 
	
}

?>

<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Edit a Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  </head>

  <body>

   
	<br>
	
    <div class="container">
	<h3>To update a record No <?php echo $id . ":";?></h3>
      <form method="post" action="update.php">
        <div class="form-group row">
          <label for="id" class="col-sm-2 col-form-label">ID</label>
          <div class="col-sm-10">
            <input type="number" readonly class="form-control" id="id" name="id" value="<?php echo $result['id']?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $result['Title']?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="author" class="col-sm-2 col-form-label">Author</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="author" name="author" value="<?php echo $result['Author']?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="genre" class="col-sm-2 col-form-label">Genre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $result['Genre']?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="height" class="col-sm-2 col-form-label">Height</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="height" name="height" value="<?php echo $result['Height']?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="publisher" name="publisher" value="<?php echo $result['Publisher']?>">
          </div>
        </div>

        <button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>		
      </form>
	  
	<br>
	<br>

	<h3>To insert a new record: </h3>

	
	   <form method="post" action="insert.php">
	   <div class="form-group row">
          <label for="id" class="col-sm-2 col-form-label">ID</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="id" name="id" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="title" class="col-sm-2 col-form-label">Title</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="author" class="col-sm-2 col-form-label">Author</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="author" name="author" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="genre" class="col-sm-2 col-form-label">Genre</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="genre" name="genre" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="height" class="col-sm-2 col-form-label">Height</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="height" name="height" value="">
          </div>
        </div>
        <div class="form-group row">
          <label for="publisher" class="col-sm-2 col-form-label">Publisher</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="publisher" name="publisher" value="">
          </div>
        </div>
		
	   <button type="submit" name="insertRecord" class="btn btn-success">Insert Record</button>
	   
	   </form>
    </div>
    <br>
	<br>
  </body>
  </html>