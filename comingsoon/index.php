<!DOCTYPE HTML>
<html>
<head>
<title>WallWood</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/home.css">
<link rel="shortcut icon" href="img/Grou2p 87.png" type="image/x-icon">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="css/animate.css">
</head>
<body>

<section class="main_center">
    <img src="img/Group 87.png" alt="">
    <div class="timer_s">
    <p id="demo"></p>
    <p class="count_days1">days&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;hours&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;minutes&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;seconds</p>
    </div>
    <div class="container">
    <h5 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">Before Launching Our<br> <span>WEBSITE</span></h5>
    </div>
</section>

<section class="white_section">
    <div class="container">
        <div class="row flex_row1">
            <div class="col-md-6">
                <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">WELCOME TO WALLWOOD CAPITAL MANAGEMENT</h3>
            </div>
            <div class="col-md-6">
                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">Wallwood Capital Management DMCC, a representative office of Wallwood Capital Management, has been established to fill a specific gap in the financial services market in the Middle East and Asia.  Courtesy of our UK registration with the Financial Conduct Authority, we are able to provide a comprehensive range of protection to clients and an unprecedented level of customer service.</p>
            </div>
        </div>
        <div class="row flex_row2">
            <div class="col-md-6">
                <h2 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s" style="text-transform: uppercase;">More Than Just Investment Management</h2>
                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s">Wallwood Capital Management provides investment services designed to assist our clients in achieving their financial objectives.
                Founded in 1998, with offices in Dubai and London and an administration centre in Derry-Londonderry, Northern Ireland - Wallwood Capital Management provides a range of investment management services to private and institutional clients.<br>

                Recommended by IFA’s and approved by leading funds platforms, Wallwood Capital Management is positioned to service Cash, ISA and SIPP/SSAS investors.  Each of the Wallwood offices offers its clients location specific bespoke services from high yield bonds through to execution only dealing, discretionary managed accounts and model portfolios.
                </p>
            </div>
            <div class="col-md-6">
                <img class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s" src="img/joel-filipe-166058-unsplash.png" alt="">
            </div>
        </div>
        
    </div>
</section>

<section class="sub_sect_2 contact_section">   
    <div class="container">
        <form name="sentMessage" id="contactForm" class="sub_secti_last">
            <div class="row">
            <h4 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">LET US TELL YOU MORE</h4>
            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">To receive more information about Wallwood Capital Management just fill in the contact form below and let us provide you with the service you deserve.</p>
                <div class="form-group col-md-4 offset-md-2 small_padding-lr wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
                    <input type="text" name="lname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email">
                </div>
                <div class="form-group col-md-4 small_padding-lr wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                    <textarea class="form-control" rows="6" placeholder="Message" name="message"></textarea>
                </div>
                <div class="col-md-12 no_padding wow fadeInUp" data-wow-duration="1s" data-wow-delay=".8s">
                    <button type="submit" class="btn">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>     
</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3"><img src="img/Group 87.png" alt=""></div>
            <div class="col-md-3">
            <p><span style="font-size: 18px;">CONTACT US</span><br>
            Wallwood Capital Management<br>
            Suits 5403, 5404 and 5404<br>
            Level 54<br>
            Almas Tower<br>
            JLT<br>
            Dubai<br>
            United Arab Emirates<br>
            </p>
            </div>
            <div class="col-md-3">
                <p><br>
                Telephone: +971 4 383 5566<br>
                www.wallwood.ae<br>
                Email: info@wallwood.ae<br></p>
            </div>
            <div class="col-md-3">
                <h5>Social Media</h5>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>


<script>
    // Set the date we're counting down to
    var countDownDate = new Date("Mar 7, 2019 15:37:25").getTime();
    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
        
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
        
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
    // Output the result in an element with id="demo"
    document.getElementById("demo").innerHTML = days + "&nbsp;&nbsp;&nbsp;&nbsp;" + hours + "&nbsp;&nbsp;&nbsp;&nbsp;" + minutes + "&nbsp;&nbsp;&nbsp;&nbsp;" + seconds + "";
        
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    },);
</script>

<script src="css/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="css/notify.js"></script>
<script>
$("#contactForm").submit(function(e) {

var url = "/mailer.php"; // the script where you handle the form input

$.ajax({
       type: "POST",
       url: url,
       data: $("#contactForm").serialize(), // serializes the form's elements.
       success: function(data)
       {
          $.notify(data, "success");
       }
     });

e.preventDefault(); // avoid to execute the actual submit of the form.
});
</script>
<script src="js/wow.min.js"></script>
<script>
new WOW().init();
</script>
</body>
</html>
