<?php
$url = parse_url(getenv("mysql://b796395327a2f1:11b8c990@us-cdbr-iron-east-04.cleardb.net/heroku_af91daa870235f5?reconnect=true"));

$host = $url["host"];
$user = $url["user"];
$password = $url["pass"];
$current_db = substr($url["path"], 1);
?>