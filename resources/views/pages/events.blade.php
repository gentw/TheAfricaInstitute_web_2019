@extends('index')
@section('title_and_meta')

@endsection
@section('content')


<section class="benefits_many">
        <div class="container">
            <h6>The<br>Benefits</h6>
            <div class="row scrollbar_all_mob_red">
                <div class="many_services_cards" ng-repeat="services_benefits in includes.global.many[0]['janar']" data-aos="zoom-in-up" data-aos-delay="150">
                    <img ng-src="/img/manjakos/<%services_benefits['collections']['icon']%>">
                    <h5><%services_benefits['collections']['date']%></h5>
                    <p ng-bind-html="services_benefits['collections']['description']['en']"></p>
                    <!-- <a href="/services/<%services_benefits.id%>/<%services_benefits.slugable.en%>">VIEW MORE</a> -->
                </div>
            </div>
        </div>
    </section>


@endsection