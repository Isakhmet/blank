$(document).ready(function () {
    $('#add-player').click(function (e) {
        e.preventDefault();
        $('.task_modal-create').addClass('midsalod');
    });

    $('.closemodal').click(function (e) {
        e.preventDefault();
        $('.task_modal-create').removeClass('midsalod');
    });

    $('#add__task').click(function () {
        $.ajax({
            url:     '/add.php',
            method:  'post',
            data:    {
                id:          1,
                description: 'descriptions'
            },
            success: function (data) {
                alert(data)
                console.log(data)
                /*if (data === 'false') {
                    console.log(data);
                } else {
                    window.location = '/create.php';
                }*/
            }
        });
    })
})