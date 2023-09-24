@extends('index')
@section('title_and_meta')

@endsection
@section('content')
<div id="carouselExampleIndicators" class="carousel slide carousel_main_det" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/Group 344.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block text_cover_home">
                <p>INTERNATIONAL CONFERENCE</p>
                <h5 class="titles">Axis of Solidarity : <br>
                    Landmarks, Platforms, Futures<br>
                    23 - 25 FEBRUARY 2019</h5>
                <a href="#" class="hbtn hover_yell">View Event</a>
                <a href="#" class="hbtn hover_yell hbtn_white">More Info</a>
                <a href="#" class="hbtn hover_yell hbtn_none_hover">Programme PDF</a>
            </div>
        </div>
    </div>

    <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a> -->
</div>

<div class="colorLayer2"></div>
		<div class="image">
			<img src="img/Group 344.png">
		</div>

<section class="home_gallery">
    <div class="container">
        <h3 class="titles">Media Gallery</h3>
        <div class="owl-carousel owl-theme gallery_carousel">
            <div class="item" ng-repeat="gallery_item in includes.global.many[0]['gallery_main']" class="g_holder_1">
                <a href="/img/manjakos/<%gallery_item['collections']['image']%>" class='strip thumbnail' data-strip-caption="Dorhout Mees F/W 2014-15" data-strip-group="dorhoutmees"><img ng-src="/img/manjakos/<%gallery_item['collections']['image']%>"></a>
                <p ng-bind-html="gallery_item['collections']['image_text']['en']"></p>
            </div>
        </div>
    </div>
</section>

<section class="africa_hall">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ URL::to('/img/manjakos/' . $one['africa_hall']['collections']['image'])}}" alt="">
            </div>
            <div class="col-md-6">
                <h4 class="titles">{{$one['africa_hall']['collections']['title']['en']}}</h4>
                <p>{!!$one['africa_hall']['collections']['description']['en']!!}</p>
                <a href="" class="special_ah">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>

<section class="home_past_events">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="titles">Past Events</h4>
                <ul class="event_list_l">
                    <li>
                        <p>5-plus-1: Rethinking Abstraction</p>
                    </li>
                    <li>
                        <p>Axis of Solidarity :
                            Landmarks, Platforms, Futures</p>
                    </li>
                    <li>
                        <p>5-plus-1: Rethinking Abstraction</p>
                    </li>
                    <li>
                        <p>Axis of Solidarity :
                            Landmarks, Platforms, Futures</p>
                    </li>
                    <li>
                        <p>5-plus-1: Rethinking Abstraction</p>
                    </li>
                    <li>
                        <p>Axis of Solidarity :
                            Landmarks, Platforms, Futures</p>
                    </li>
                    <li>
                        <p>5-plus-1: Rethinking Abstraction</p>
                    </li>
                    <li>
                        <p>Axis of Solidarity :
                            Landmarks, Platforms, Futures</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-5">
                <div class="past_event_cards">
                    <img src="img/Mask Group 11.jpg">
                    <h6>FEBRUARY 23, 2019</h6>
                    <h3 class="titles">Axis of Solidarity : Landmarks, Platforms, Futures</h3>
                    <p>This conference will bring together scholars, writers, curators, researchers, and artists to reflect on the international solidarity movements that emerged in the second half of the twentieth century during processes of decolonisation in Africa, Asia and Latin America.</p>
                    <a href="#" class="hbtn hover_yell">View Event</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="past_event_cards">
                    <img src="img/Mask Group 11.jpg">
                    <h6>FEBRUARY 23, 2019</h6>
                    <h3 class="titles">Axis of Solidarity : Landmarks, Platforms, Futures</h3>
                    <p>This conference will bring together scholars, writers, curators, researchers, and artists to reflect on the international solidarity movements that emerged in the second half of the twentieth century during processes of decolonisation in Africa, Asia and Latin America.</p>
                    <a href="#" class="hbtn hover_yell">View Event</a>
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.stay_in')
<section class="join_our_team">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="titles">Join Our Team</h4>
            </div>
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <a href="#" class="hbtn hover_yell">Join</a>
            </div>
        </div>
    </div>
</section>
@endsection