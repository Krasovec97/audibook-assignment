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
            // Show loading animation
            $('.alert').hide()
            $('#submitBtn').hide()
            $("#loading").show()
            setTimeout(function () {
                // Show button, hide animation
                $("#loading").hide()
                $('#submitBtn').show()
            }, 500)
        },
        success: function (data) {
            if (data.code == 200){
                setTimeout(function () {
                    // If successful, show success message and button
                    $('#successAlert').show()
                    $("#loading").hide()
                    $('#submitBtn').show()
                }, 500)
            } else {
                setTimeout(function () {
                    // If failed, show button and alert with response data.
                    $('#submitBtn').show();
                    $("#errorAlert").show();
                    $("#errorAlert").text(data.error);
                }, 500)
            }
        }

    });
});



