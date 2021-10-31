<?php

include_once 'header.php';
include_once 'Database.php';

if(isset($_POST['name'])) {
    $db = new Database();
    $id = $db->getLastId("INSERT INTO `teams`(name) VALUES('{$_POST['name']}')");
    
    header('Location:http://localhost/blank/samples/edit.php?team='.$id);
}

?>

<div class="container">
    <form action="create.php" method="POST">
        <div class="form-group">
            <label for="">Название команды</label>
            <input type="text" class="form-control" name="name" id="team_name" placeholder="Chelsea">
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
</div>
