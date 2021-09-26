<?php

include_once 'Database.php';

$db = new Database();

$data['name'] = $_POST['name'] ?? 'Mark';
$data['number'] = $_POST['number'] ?? 12;
$data['team'] = $_POST['team'] ?? null;
$data['team'] = 'test';

if(!empty($data)) {
    $sql = "SELECT id from teams  where name='". $data['team']."'";
    $team = $db->query($sql)->fetch();
    $teamId = (int)$team['id'];
    
    $db->query("INSERT INTO `players`(name, number, team_id) VALUES ('{$data['name']}', '{$data['number']}', '$teamId')");
}

echo 'success';
//die(var_dump($data));