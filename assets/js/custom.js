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

// Input ticket qty
$(document).ready(function () {
    $(".input-tix").on('input',function () {

        var qty = $(this).val();
        var id = $(this).attr('id');
        var aPrice = 0;
        var cPrice = 0;
        var sPrice = 0;
        var totalPrice = parseInt($('#totalTix').text());
                
        if(id=="inputAdult"){
            aPrice = qty * 18;
            $('#adultQty').text(qty);
            $('#adultTix').text('$ '+aPrice+'.00');
            totalPrice = totalPrice + aPrice;
        }else if (id=="inputChild"){
            cPrice = qty * 14;
            $('#childQty').text(qty);
            $('#childTix').text('$ '+cPrice+'.00');
            totalPrice = totalPrice + cPrice;
        }else if (id=="inputSenior"){
            sPrice = qty * 16;
            $('#seniorQty').text(qty);
            $('#seniorTix').text('$ '+sPrice+'.00');
            totalPrice = totalPrice + sPrice;
        }
        
        $('#totalTix').text(totalPrice);
    });
});

// Select Seat
$(document).ready(function () {  
    var seats = [];
    var checker = 0;
    var adult = 0;
    var child = 0;
    var senior = 0;

    console.log(seats);
    $(".free").on('click',function () {
        var seat = $(this).attr('id');

        adult = parseInt($('#adultQty').text());
        child = parseInt($('#childQty').text());
        senior = parseInt($('#seniorQty').text());

        if(seats.length==0){
            seats.push(seat);
        }else{
            for (let x = 0; x < seats.length; x++) {
                if(seat==seats[x]){
                    checker = 1;
                }
            }

            if(checker!=1){
                seats.push(seat);
            }

            checker = 0;
        }

        $(this).removeClass('free');

        var data = {
            seats: seats,
            aQty: adult,
            sQty: senior,
            cQty: child
        };

        $.ajax({
            type: "POST",
            url: "process-seats.php",
            data: data,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            var selectedSeats = data.join(' ')
            $('#selectedSeats').html(selectedSeats);
        });
    });
});

// Pay
$(document).ready(function () {
    $("#pay").on('click',function () {
        var adult = parseInt($('#adultQty').text());
        var child = parseInt($('#childQty').text());
        var senior = parseInt($('#seniorQty').text());
        var seatCount = adult + child + senior;

        var data = {
            qty: seatCount,
            cost: parseInt($("#totalTix").text())
        };

        $.ajax({
            type: "POST",
            url: "process-checkout.php",
            data: data,
            dataType: "html",
            encode: true,
        }).done(function (data) {
            $("#bookingContainer").hide();
            $("#tickets").html(data);
        });
    });
});

// Display schedule based on selected date via Ajax
$(document).ready(function () {
    $("select#date").on('change',function(id) {
        var data = {
            date: $(this).val()
        };
        
        $.ajax({
            type: "POST",
            url: "process-schedule.php",
            data: data,
            dataType: "html",
            encode: true,
        }).done(function (data) {
            $("#scheduleContainer").html(data);
        });
    });
});

// Display now showing movie list via Ajax
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

// Display coming soon movie list via Ajax
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