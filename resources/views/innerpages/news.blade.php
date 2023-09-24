
<div class="dark_navigationbar">
@extends('index')
@section('title_and_meta')

@endsection
@section('content')
</div>

<!-- <section class="default_innerpage_cover_news">
    <div class="container">
        <h2>{{ $entity[0]['collections']['title']['en'] }}</h2>
    </div>
</section> -->

<section class="news_innerpage_big_card">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 no_padding">
                <div class="top_image_card-b" style="background-image: url({{ URL::to('/img/manjakos/' . $entity[0]['collections']['image'])}})">
            <div class="overlay_cover_inner"></div></div>
                <div class="container details_card_description">
                    <h6 class="dark_default_title">{{ $entity[0]['collections']['title']['en'] }}</h6>                
                    <div class="desc">
                        {!! $entity[0]['collections']['description']['en'] !!}
                    </div>        
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container related_1">
    <div class="col-md-12 ">      
        <h2>Related Posts</h2>                          
        <hr class="hr_default">
    </div>
    <div class="row">
        @include('includes.news_inc')
    </div>
</div>



@endsection
 