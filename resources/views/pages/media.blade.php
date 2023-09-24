@extends('index')
@section('title_and_meta')

@endsection
@section('content')
<section class="media_section">
    <div class="container">
        <h1 class="titles">Media</h1>
        <p>Images</p>
        <hr>
        <div class="row">
            <div ng-repeat="gallery_item in includes.global.many[0]['gallery_main']" class="g_holder_1">
                <a href="/img/manjakos/<%gallery_item['collections']['image']%>" class='strip thumbnail' data-strip-caption="Dorhout Mees F/W 2014-15" data-strip-group="dorhoutmees">
                    <img ng-src="/img/manjakos/<%gallery_item['collections']['image']%>">
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <p>Videos</p>
        <hr>
        <div class="row">
            <div ng-repeat="gallery_item in includes.global.many[1]['video_main']" class="g_holder_1">
                <a href="<%gallery_item['collections']['video_url']['en']%>" class='strip thumbnail thumbnail-landscape'>
                <div class="overlay_video"><img src="img/playa.svg" alt=""><h6 class="titles"><%gallery_item['collections']['video_title']['en']%></h6></div>
                    <img ng-src="/img/manjakos/<%gallery_item['collections']['image_vid']%>">
                </a>
            </div>
            <div ng-repeat="gallery_item in includes.global.many[1]['video_main']" class="g_holder_1">
                <a href="<%gallery_item['collections']['video_url']['en']%>" class='strip thumbnail thumbnail-landscape'>
                <div class="overlay_video"><img src="img/playa.svg" alt=""><h6 class="titles"><%gallery_item['collections']['video_title']['en']%></h6></div>
                    <img ng-src="/img/manjakos/<%gallery_item['collections']['image_vid']%>">
                </a>
            </div>
            <div ng-repeat="gallery_item in includes.global.many[1]['video_main']" class="g_holder_1">
                <a href="<%gallery_item['collections']['video_url']['en']%>" class='strip thumbnail thumbnail-landscape'>
                <div class="overlay_video"><img src="img/playa.svg" alt=""><h6 class="titles"><%gallery_item['collections']['video_title']['en']%></h6></div>
                    <img ng-src="/img/manjakos/<%gallery_item['collections']['image_vid']%>">
                </a>
            </div>
            <div ng-repeat="gallery_item in includes.global.many[1]['video_main']" class="g_holder_1">
                <a href="<%gallery_item['collections']['video_url']['en']%>" class='strip thumbnail thumbnail-landscape'>
                <div class="overlay_video"><img src="img/playa.svg" alt=""><h6 class="titles"><%gallery_item['collections']['video_title']['en']%></h6></div>
                    <img ng-src="/img/manjakos/<%gallery_item['collections']['image_vid']%>">
                </a>
            </div>
            <div ng-repeat="gallery_item in includes.global.many[1]['video_main']" class="g_holder_1">
                <a href="<%gallery_item['collections']['video_url']['en']%>" class='strip thumbnail thumbnail-landscape'>
                <div class="overlay_video"><img src="img/playa.svg" alt=""><h6 class="titles"><%gallery_item['collections']['video_title']['en']%></h6></div>
                    <img ng-src="/img/manjakos/<%gallery_item['collections']['image_vid']%>">
                </a>
            </div>
        </div>
    </div>
</section>

@include('includes.stay_in')
@endsection