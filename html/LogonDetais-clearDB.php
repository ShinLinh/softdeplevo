<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host = $url["host"];
$user = $url["host"];
$password = $url["host"];
$current_db = substr($url["path"], 1);
/*$current_db = "SDE_db";*/

?>