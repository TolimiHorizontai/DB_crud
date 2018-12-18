<?php

require_once('../db_configuration.php');

$id = 56; //sis failas nesusietas su knygu saraso failu, todel negalima rasyti GET

echo "There`s a record number " . $id;
echo "<br>";

$sql = 'SELECT * FROM books where id = :id LIMIT 1'; //dvitaskis padaro placeholder`i, galima tiesiog ir $id rasyti - tada tiesiog bus tuscias laukas, be placeholder`io

$result = $db_connection->prepare($sql);

$result -> execute(['id' => $id]);

//$result = $result -> fetch(); //atspausdina viska, PDO::FETCH_BOTH
//echo"<pre>";
//print_r($result);
//echo "<br>";

$result = $result -> fetch(PDO::FETCH_ASSOC); //atspausdina tik pagal parametrus
//$result = $result -> fetch(PDO::FETCH_NUM); //atspausdina pagal rakto numeri

echo"<pre>";
print_r($result);
echo "<br>";

print_r($result['Title']); // jei fetch pagal numeri, reikia vietoj Title rasyti 1

