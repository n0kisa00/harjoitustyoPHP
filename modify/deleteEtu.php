<?php
require_once "../inc/functions.php";
require_once "../inc/headers.php";

$db = null;

$input = json_decode(file_get_contents("php://input"));
$etNro = filter_var($input->etNro,FILTER_SANITIZE_NUMBER_INT);
$et_nimi = filter_var($input->et_nimi,FILTER_SANITIZE_STRING);

try {
    $db = openDb();
    $db->beginTransaction();

    $sql = "delete from etutaso where etNro=$etNro";

    // $etu_id = executeInsert($db,$sql);
    $query = $db->query($sql);
    $db->commit();
    header("HTTP/1.1 200 OK");
    echo json_encode(array('status' => 'ok'));
}
catch (PDOException $pdoex) {
    $db->rollback();
    returnError($pdoex);
}