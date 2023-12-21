<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

echo $dbhost. '  '.$dbport.'  '.$dbuser.'  '.$dbpwd.'  '.$dbname;

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$result = $connection->query("SELECT * FROM users order by id asc");

//Initialize array variable
$dbdata = [];

//Fetch into associative array
while ($row = $result->fetch_assoc()) {
  $dbdata[] = $row;
}

//Print array in JSON format
//echo json_encode($dbdata);
$data=array('userDetails'=>$dbdata);
echo '<pre>'.print_r($data,true).'</pre>';

$connection->close();
?>
