<?php
$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("databaseuser");
$dbpwd = getenv("databasepassword");
$dbname = getenv("databasename");

$connection = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
if ($connection->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$id=mysqli_real_escape_string($connection,intval($_GET['id']));
$result = $connection->query("SELECT * FROM users where id=$id limit 0,1");

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
