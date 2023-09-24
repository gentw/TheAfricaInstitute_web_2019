<!doctype html>
<html lang="{{ app()->getLocale() }}" ng-app="alrayan1">

<head>
    <title>The Africa Institute</title>
    <meta charset="utf-8">
    <link rel="icon" href="img/Group 122216.png">
    <meta name="theme-color" content="#272F34" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular-sanitize.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
    <script src="{{url('js/base.min.js')}}"></script>
    <script src="{{url('v4 bootstrap/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{url('js/app.js')}}"></script>
    <script src="/js/notify.js"></script>
    <script src="/js/jquery.countup.js"></script>
    <link rel="stylesheet" href="{{url('v4 bootstrap/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/build.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="{{url('css/app.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('css/seo_edit.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas+Neue|Roboto:300,400&display=swap">
    <link href="http://www.stripjs.com/bower_components/strip/dist/css/strip.css" media="all" rel="stylesheet" type="text/css">

    @yield('title_and_meta')
</head>

<body ng-controller="HeaderCtrl">
    <div class="header">
        @include('navbar.navbar')
    </div>
    <div>
        @yield('content')
    </div>
    @include('includes.footer')

    <script>
        $("#contactForm").submit(function(e) {

            var url = "/mailer.php"; // the script where you handle the form input

            $.ajax({
                type: "POST",
                url: url,
                data: $("#contactForm").serialize(), // serializes the form's elements.
                success: function(data) {
                    $.notify(data, "success");
                    document.getElementById("contactForm").reset();
                }
            });

            e.preventDefault(); // avoid to execute the actual submit of the form.
        });
    </script>
    <script>
	$(document).ready(function(){
		// Page Readt
		$(".colorLayer2").animate({left:"0px"},300);
		$(".image img").animate({left:"0px"},300);
		$(".colorLayer2").delay(200).animate({left:"100%"},500);
		$(".colorLayer2").delay(200).animate({width:"0px"},400);

		// ON SCROLL
		$(window).scroll(function(){
			
		if($(this).scrollTop() >= 0 && $(this).scrollTop() <= 13050)
		{
			$(".colorLayer3").delay(1400).animate({left:"0px"},300);
			$(".images").delay(1500).animate({left:"0px"});
			$(".colorLayer3").delay(400).animate({left:"100%"},300);
			$(".colorLayer3").delay(400).animate({width:"0px"},300);
			}
		});
	});
    </script>
</body>

</html>