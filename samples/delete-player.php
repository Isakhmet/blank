<?php

include_once 'Database.php';

$db = new Database();
$id = $_REQUEST['player_id'];

if(isset($id)) {
    $sql = "DELETE FROM players  where id='$id'";
    $db->deleteQuery($sql);
}

echo 'success';