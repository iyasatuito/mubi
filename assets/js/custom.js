//  https://www.digitalocean.com/community/tutorials/submitting-ajax-forms-with-jquery

// Submit Edit Account Form via Ajax

console.log('hi');

$(document).ready(function () {
    $("form#editAccount").on('submit',function (event) {
        event.preventDefault();

        var formData = {
            fname: $("#fname").val(),
            lname: $("#lname").val(),
            email: $("#email").val(),
            password: $("#password").val()
        };
        
        $.ajax({
            type: "POST",
            url: "process-account.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            $(".msg").show().text(data);
        });
    });
});