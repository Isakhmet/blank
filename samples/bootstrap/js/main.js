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
        $('.task_modal-create').addClass('midsalod');
    });

    $('.closemodal').click(function (e) {
        e.preventDefault();
        $('.task_modal-create').removeClass('midsalod');
    });

    $('#add__task').click(function () {

        var name   = $("input[name=user]").val(); 
        var number = $("input[name=number]").val(); 
        var team   = $("#team_name").text();

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
    })
})