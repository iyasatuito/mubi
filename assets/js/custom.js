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
        // event.preventDefault();
        // alert($(this).val());
        // alert($(this).attr('id'));

        var qty = $(this).val();
        var id = $(this).attr('id');
        var aPrice = 0;
        var cPrice = 0;
        var sPrice = 0;
        var totalPrice = parseInt($('#totalTix').text());
                
        if(id=="inputAdult"){
            // console.log('h');
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
    // var seatCount = 0;

    console.log(seats);
    $(".free").on('click',function () {
        var seat = $(this).attr('id');

        adult = parseInt($('#adultQty').text());
        child = parseInt($('#childQty').text());
        senior = parseInt($('#seniorQty').text());
        // seatCount = adult + child + senior;
        // var seatCount = adult + child + senior;

        // console.log(seats.length);
        // console.log(seats);     

        if(seats.length==0){
            // console.log('empty array');
            seats.push(seat);
        }else{
            // console.log('not empty');
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

        // console.log(seats);
        // console.log(seat);
                

        

        // color selected seats
        $(this).removeClass('free');
        // $(this).toggleClass('reserved');

        var data = {
            seats: seats,
            aQty: adult,
            sQty: senior,
            cQty: child
        };

        // //console.log('hi');
        
        $.ajax({
            type: "POST",
            url: "process-seats.php",
            data: data,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            // $(".msg").show().text(data);
            //console.log('hell');
            var selectedSeats = data.join(' ')
            $('#selectedSeats').html(selectedSeats);
        });
    });
});

// Select Seat
$(document).ready(function () {  
    // var seats = [];

    $(".reserved").on('click',function () {
        // var seat = $(this).attr('id');
        // // var seatCount = adult + child + senior;

        // seats.push(seat);
        
        // // for(var i = 0; i < seatCount; i++) {
        // //     actuatSeats.push('io');
        // // }

        // $('#selectedSeats').html(seats);

        // color selected seats
        // $(this).removeClass('reserved');
        // $(this).addClass('free');

        // var data = {
        //     seat: $(this).attr('id')
        // };

        // // //console.log('hi');
        
        // $.ajax({
        //     type: "POST",
        //     url: "process-account.php",
        //     data: data,
        //     dataType: "json",
        //     encode: true,
        // }).done(function (data) {
        //     $(".msg").show().text(data);
        //     //console.log('hell');
        // });
    });
});


// Checkout
$(document).ready(function () {
    $("#checkout").on('click',function () {
        // $("#selectedSeatsLabel").show();
        // $("#selectedSeats").show();
        
        // $("#selectedSeats").show();

        // let adult = parseInt($('#adultQty').text());
        // let child = parseInt($('#childQty').text());
        // let senior = parseInt($('#seniorQty').text());
        // let seatCount = adult + child + senior;

        // if(seatCount)


        // $("#checkout").hide();
        // $("#back").show();
        // $("#pay").show();
        
        // $(".step1").hide();
        // $(".step2").hide();
        // $(".step3").show();
        // $(".step4").show();
        

    });
});

// Back
// $(document).ready(function () {
//     $("#back").on('click',function () {
//         $("#checkout").show();
//         $("#back").hide();        
//         $("#pay").hide();
        
//         $(".step1").show();
//         $(".step2").show();
//         $(".step3").hide();
//         $(".step4").hide();
//     });
// });

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
            date: $(this).val()
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


// print page

