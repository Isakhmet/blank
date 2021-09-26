<?php

include_once 'header.php';

?>

<div class="container">
    <form action="create.php">
        <div class="form-group">
            <label for="">Название команды</label>
            <input type="text" class="form-control" id="team_name" placeholder="Chelsea">
        </div>
        <div class="form-group players">
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        <div class="form-group">
            <button id="add-player" class="btn btn-success">Добавить игрока</button>
        </div>
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
                <input type="text" name="number" placeholder="Номер игрока">
            </div>
            <div class="task_create">
                <a href="" id="add__task" class="create_button">Создать</a>
            </div>
        </div>
    </div>
</div>
