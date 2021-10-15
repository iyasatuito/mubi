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

// Display schedule based on selected date via Ajax
$(document).ready(function () {
    $("select#date").on('change',function(id) {
        var data = {
            date: $(this).val(),
            id: 'M001'
        };
        
        $.ajax({
            type: "POST",
            url: "process-schedule.php",
            data: data,
            dataType: "html",
            encode: true,
        }).done(function (data) {
            // $(".msg").show().text(data);
            // console.log('hello');
            $("#scheduleContainer").html(data);
        });
    });
});

// Display schedule based on selected date via Ajax
$(document).ready(function () {
    $("#nowShowing").on('click',function(id) {
        $('#nowShowing').addClass('mustard-bg');
        $('#nowShowing').removeClass('corn-bg');
        $('#comingSoon').addClass('corn-bg');
        $('#comingSoon').removeClass('mustard-bg');

        var data = {
            type: 'now'
        };
        
        $.ajax({
            type: "POST",
            url: "process-movies.php",
            data: data,
            dataType: "html",
            encode: true,
        }).done(function (data) {
            $("#movieList").html(data);
        });
    });
});

// Display schedule based on selected date via Ajax
$(document).ready(function () {
    $("#comingSoon").on('click',function(id) {        
        $('#nowShowing').addClass('corn-bg');
        $('#nowShowing').removeClass('mustard-bg');
        $('#comingSoon').addClass('mustard-bg');
        $('#comingSoon').removeClass('corn-bg');

        var data = {
            type: 'upcoming'
        };
        
        $.ajax({
            type: "POST",
            url: "process-movies.php",
            data: data,
            dataType: "html",
            encode: true,
        }).done(function (data) {
            $("#movieList").html(data);
        });
    });
});