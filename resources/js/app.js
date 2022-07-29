import './bootstrap';

import '../sass/app.scss'

$("#loading").hide();

$('#submitBtn').on('click',function () {
    let request = $.ajax({
        url: "http://localhost:8000/api/application",
        type: "POST",
        data: $('#applicationForm').serialize(),
        dataType: "json"
    });

    request.done(function (msg) {
        console.log('Success: ' + msg.code);
    });

    request.fail(function (msg){
        console.log('Error: ' + msg);
    });
});



