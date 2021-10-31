<?php
include_once 'header.php';

$dbh = new PDO('mysql:host=localhost;dbname=blank', 'user', 'password');
$teams = array();
foreach ($dbh->query('SELECT * from teams') as $key => $row) {
    $teams[$key]['id']   = (int)$row['id'];
    $teams[$key]['name'] = $row['name'];
}

include_once "Blank.php";

if($_POST) {
    $blank = new Blank();
    $blank->download($_POST["first_team"], $_POST["second_team"]);
}

?>

<div class="container">
    <form action="index.php" method="post">
        <div class="form-group">
            <label for="first_team">Выберите команду 1</label>
            <select id="first_team" name="first_team" class="form-control" aria-label=".form-select-lg example">
                <option selected>Выберите команду</option>
                <?php
                foreach ($teams as $team) {
                    echo '<option value="' . $team["id"] . '">' . $team["name"] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="second_team">Выберите команду 2</label>
            <select id="second_team" name="second_team" class="form-control" aria-label=".form-select-lg example">
                <option selected>Выберите команду</option>
                <?php
                foreach ($teams as $team) {
                    echo '<option value="' . $team["id"] . '">' . $team["name"] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <a href="create.php" class="btn btn-success">Добавить новую команду</a>
        </div>
        <div class="form-group">
            <a href="edit.php" class="btn btn-success">Редактировать команды</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
