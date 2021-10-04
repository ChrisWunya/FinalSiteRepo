<?php
// Output Buffering
ob_start();
// $db['db_host'] = "localhost:42000";
// $db['db_user'] = "root";
// $db['db_pass'] = "";
// $db['db_name'] = "cms_db";
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "cms";

// foreach ($db as $key => $value) {
// define(strtoupper($key), $value);
// }

$connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

if ($connection) {
echo '<b>Connected Successfully!</b>';
} else {
  echo 'connection failed';
}
