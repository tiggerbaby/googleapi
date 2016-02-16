<?php

//Connect to database
$dbc = new mysqli('localhost', 'root', '', 'schlock');


// Capture and save the chosen city ID
// $cityID =  $_GET['city'];


//Prepare SQL
$sql = "SELECT tag_id,COUNT(tag_id) AS tagCount, id, tag FROM movies_tag INNER JOIN tags ON tag_id=id GROUP BY tag_id";

//Run the query and capture the result
$result = $dbc->query( $sql );

//Extract the result
// $suburbs = $result->fetch_all(MYSQLI_ASSOC);
$tags = json_encode($result->fetch_all(MYSQLI_ASSOC));

//Convert the data into JSON
// $suburbs = json_encode($suburbs);

header('Content-Type:application/json');

echo $tags;