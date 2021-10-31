<?php

include_once 'header.php';
include_once 'Database.php';

$db = new Database();

if(isset($_REQUEST['team'])) {
    $players = array();
    $team = $db->query('SELECT * from teams where id='. $_REQUEST['team']);
    $team = $team->fetch();
    $teamId =  $_REQUEST['team'];

    //die(var_dump($team));
    foreach ($db->query('SELECT * from players where team_id=' .$teamId) as $key => $row) {
        $players[$key]['id']     = (int)$row['id'];
        $players[$key]['name']   = $row['name'];
        $players[$key]['number'] = $row['number'];
    }
}else{
    $teams = array();
    
    foreach ($db->query('SELECT * from teams') as $key => $row) {
        $teams[$key]['id']   = (int)$row['id'];
        $teams[$key]['name'] = $row['name'];
    }
}

?>

<div class="container">
    <form>
        <?php

            $output = '';
            if(!isset($_REQUEST['team'])){
                $output .= '
                <div class="form-group">
                    <label for="team">Выберите команду</label>
                    <select id="team" class="form-control" aria-label=".form-select-lg example">
                        <option selected>Выберите команду</option>';
                 
                    foreach ($teams as $team) {
                       $output .= '<option value="' . $team["id"] . '">' . $team["name"] . '</option>';
                    }
                    
                    $output .= '</select>
                    </div>';
            }else {
               $output .= '
               <div class="form-group">
                    <label for="">Название команды</label>
                    <p id="team_name" value="'.$team['name'].'">'.$team['name'].'</p>
                </div>
                <div class="form-group">
                    <label for="">Игроки</label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ФИО</th>
                                <th scope="col">Номер</th>
                                <th scope="col">Действие</th>
                            </tr>
                        </thead>
                   <tbody>';
                   
                foreach($players as $player) {
                    $output .= '
                    <tr>
                        <th scope="row">'.$player["id"].'</th>
                        <td>'.$player["name"].'</td>
                        <td>'.$player["number"].'</td>
                        <td>
                            <button type="button" onclick="edit('.$player["id"].', '."'{$player["name"]}'".', '.$player["number"].')" class="btn btn-primary">Редактировать</button>
                            <button type="button" onclick="deletePlayer('.$player["id"].')" class="btn btn-danger">Удалить</button>
                        </td>
                    </tr>';
                }
                
                $output .= '</tbody></table></div>
                    <div class="form-group">
                        <button id="add-player" class="btn btn-success">Добавить игрока</button>
                    </div>
                    <button id="edit_save" type="button" class="btn btn-primary">Сохранить</button>';
            }

            echo $output;
        ?>
    </form>

    <div id="task_modal-create" class="task_modal-create" aria-hidden="true">
        <div class="wrap_modal">
            <div class="task_title">
                <h2>Создать нового игрока</h2>
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

    <div id="edit-player" class="task_modal-create" aria-hidden="true">
        <div class="wrap_modal">
            <div class="task_title">
                <h2>Редактировать данные игрока</h2>
                <a href="#" class="task_close closemodal" aria-hidden="true">×</a>
            </div>
            <div class="task_fields">
                <input type="text" name="edit_user" placeholder="Имя игрока">
                <input type="number" name="edit_number" placeholder="Номер игрока">
                <input type="hidden" name="edit_id">
            </div>
            <div class="task_create">
                <a href="" id="update" class="create_button">Сохранить</a>
            </div>
        </div>
    </div>
</div>
