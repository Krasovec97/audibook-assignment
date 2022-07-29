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
            $('#submitBtn').hide()
            $("#loading").show()
            setTimeout(function () {
                $("#loading").hide()
                $('#submitBtn').show()
            }, 1000)
        },
        success: function (data) {
            console.log(data);
            if (data.code == 200){
                $("#errorAlert").hide();
                $('#successAlert').show();
            }else {
                $('#submitBtn').show();
                $("#errorAlert").show();
                $("#errorAlert").text(data.error);
            }
        }

    });
});



