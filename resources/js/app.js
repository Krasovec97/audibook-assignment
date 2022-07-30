import './bootstrap';

import '../sass/app.scss'

$("#loading").hide();
$('#successAlert').hide();
$('#errorAlert').hide();

$('#submitBtn').on('click',function () {
    $.ajax({
        url: "http://localhost:8000/api/application",
        type: "POST",
        data: $('#applicationForm').serialize(),
        dataType: "json",
        beforeSend: function () {
            $('.alert').hide()
            $('#submitBtn').hide()
            $("#loading").show()
            setTimeout(function () {
                $("#loading").hide()
                $('#submitBtn').show()
            }, 500)
        },
        success: function (data) {
            console.log(data);
            if (data.code == 200){
                setTimeout(function () {
                    $('#successAlert').show()
                    $("#loading").hide()
                    $('#submitBtn').show()
                }, 500)
            }else {
                setTimeout(function () {
                    $('#submitBtn').show();
                    $("#errorAlert").show();
                    $("#errorAlert").text(data.error);
                }, 500)
            }
        }

    });
});



