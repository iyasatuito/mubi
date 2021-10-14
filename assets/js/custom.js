// Carousel
var myCarousel = document.querySelector('#myCarousel')
var carousel = new bootstrap.Carousel(myCarousel)

// Play Btn
$(document).ready(function () {
    $(".play-btn").on('click', function() {
        console.log('banner');
        $(".video-cover").hide();
        $(".play-btn").hide();
        $(".yt-video").src += "?autoplay=1";
    });
});

// Submit Edit Account Form via Ajax
$(document).ready(function () {
    $("form#editAccount").on('submit',function (event) {
        event.preventDefault();

        var data = {
            fname: $("#fname").val(),
            lname: $("#lname").val(),
            email: $("#email").val(),
            password: $("#password").val()
        };

        //console.log('hi');
        
        $.ajax({
            type: "POST",
            url: "process-account.php",
            data: data,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            $(".msg").show().text(data);
            //console.log('hell');
        });
    });
});