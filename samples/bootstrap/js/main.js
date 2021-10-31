$(document).ready(function () {
    /* $("#team_name").on("input", function() {
        var text = $(this).val();

        if(text.length >= 2) {
            $('.players').css('display', 'block');
        }else {
            $('.players').css('display', 'none');
        }
     }); */

    $('#add-player').click(function (e) {
        e.preventDefault();
        $('#task_modal-create').addClass('midsalod');
    });

    $('.closemodal').click(function (e) {
        e.preventDefault();
        $('.task_modal-create').removeClass('midsalod');
    });

    $('.closemodal').click(function (e) {
        e.preventDefault();
        $('#edit-player').removeClass('midsalod');
    });

    $('#team').change(function () {
        window.location = '/blank/samples/edit.php?team=' + $('#team').val();
    })
    
    $('#update').click(function () {
        var name   = $("input[name=edit_user]").val(); 
        var number = $("input[name=edit_number]").val(); 
        var id   = $("input[name=edit_id]").val();

        $.ajax({
            url:     '/blank/samples/update.php',
            method:  'post',
            data:    {
                edit_name:   name,
                edit_number: number,
                player_id:   id
            },
            success: function (data) {
                alert(data)
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
        });
    })

    $("#edit_save").click(function() {
        window.location = '/blank/samples/index.php';
    })

    $('#add__task').click(function () {

        var name   = $("input[name=user]").val(); 
        var number = $("input[name=number]").val(); 
        var team   = $("#team_name").text();
        console.log(team);
        console.log(number);
        console.log(name);

        $.ajax({
            url:     '/blank/samples/add.php',
            method:  'post',
            data:    {
                name:   name,
                number: number,
                team:   team
            },
            success: function (data) {
                alert(data)
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
                alert(thrownError);
              }
        });
    })
})

function edit(id, name, number)
{
    $("input[name=edit_id]").val(id);
    $("input[name=edit_user]").val(name);
    $("input[name=edit_number]").val(number);
    $('#edit-player').addClass('midsalod');
}

function deletePlayer(id)
{
    $.ajax({
        url:     '/blank/samples/delete-player.php?player_id=' + id,
        method:  'get',
        success: function (data) {
            alert(data)
            console.log(data)
            /*if (data === 'false') {
                console.log(data);
            } else {
                window.location = '/create.php';
            }*/
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
    });
}