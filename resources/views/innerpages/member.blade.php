@extends('index')
@section('title_and_meta')


<div class="contact_header">
    @endsection
    @section('content')
</div>
<section class="member_section_all">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-1">
                <div class="member_image" style="background-image: url({{ URL::to('/img/manjakos/' . $entity[0]['collections']['image'])}})"></div>
                <div class="member_text">
                </div>
            </div>
            <div class="col-md-6">
                <h6 class="titles">{{ $entity[0]['collections']['name']['en'] }}</h6>
                <div class="desc">
                    {!! $entity[0]['collections']['biography']['en'] !!}
                </div>
            </div>
        </div>
    </div>
</section>

@include('includes.stay_in')

@endsection