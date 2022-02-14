<?php 

require_once ("classes/env.php");
require_once ("classes/db.php");

(new Env())->load();

$conn = (new Database())->getConnection();

?>