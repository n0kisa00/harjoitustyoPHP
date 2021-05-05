<?php
require_once "../inc/functions.php";
require_once "../inc/headers.php";

try {
    $db = openDb();
    selectAsJson($db,"select * from etutaso order by etNro");
}
catch (PDOException $pdoex) {
    returnError($pdoex);
}