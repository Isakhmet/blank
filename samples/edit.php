<?php

include_once 'header.php';
include_once 'Database.php';

//$dbh = new PDO('mysql:host=localhost;dbname=blank', 'user', 'password');
$db = new Database();
$players = array();
$team = $db->query('SELECT * from teams where id='. $_REQUEST['team']);
$team = $team->fetch();
$teamId =  $_REQUEST['team'];


foreach ($db->query('SELECT * from players where team_id=' .$teamId) as $key => $row) {
    $players[$key]['id']     = (int)$row['id'];
    $players[$key]['name']   = $row['name'];
    $players[$key]['number'] = $row['number'];
}

?>

<div class="container">
    <form>
        <div class="form-group">
            <label for="">Название команды</label>
            <p id="team_name" value="<?= $team['name'] ?>"><?= $team['name'] ?></p>
        </div>
        <div class="form-group">
            <label for="">Игроки</label>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ФИО</th>
                    <th scope="col">Номер</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($players as $player) {
                    echo '<tr>
                    <th scope="row">'.$player["id"].'</th>
                    <td>'.$player["name"].'</td>
                    <td>'.$player["number"].'</td>
                </tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <button id="add-player" class="btn btn-success">Добавить игрока</button>
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>

    <div class="task_modal-create" aria-hidden="true">
        <div class="wrap_modal">
            <div class="task_title">
                <h2>Создать новую задачу</h2>
                <a href="#" class="task_close closemodal" aria-hidden="true">×</a>
            </div>
            <div class="task_fields">
                <input type="text" name="user" placeholder="Имя игрока">
                <input type="number" name="number" placeholder="Номер игрока">
            </div>
            <div class="task_create">
                <a href="" id="add__task" class="create_button">Создать</a>
            </div>
        </div>
    </div>
</div>
