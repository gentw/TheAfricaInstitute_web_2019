@extends('index')
@section('title_and_meta')

@endsection
@section('content')
<section class="intern_cover about_main">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p>ABOUT US</p>
				<h5 class="titles">{{$one['cover_about']['collections']['title']['en']}}</h5>
				<h6>{!!$one['cover_about']['collections']['description']['en']!!}</h6>
			</div>
			<div class="col-md-6">
				<img src="{{ URL::to('/img/manjakos/' . $one['cover_about']['collections']['image'])}}" alt="">
				<div class="nth_after1"></div>
				<div class="nth_after"></div>
			</div>
		</div>
	</div>
</section>

<section class="nd_about">
	<div class="container">
		<p>Expertise Areas</p>
		<div class="row">
			<div class="col-md-4" ng-repeat="repeat_nd in includes.global.many[2]['second_about']">
				<h4 class="titles"><%repeat_nd['collections']['title']['en']%></h4>
				<p ng-bind-html="repeat_nd['collections']['description']['en']"></p>
				<a href="" class="special_ah">Read More <i class="fas fa-arrow-right"></i></a>
			</div>
		</div>
	</div>
</section>

<section class="mission_goals">
	<div class="container">
		<div class="row">
			<h4 class="titles">Mission &<br>Goals</h4>
			<img src="{{ URL::to('/img/manjakos/' . $one['mission_goals']['collections']['image'])}}" alt="">
		</div>
		<div class="row">
			<p>{!!$one['mission_goals']['collections']['description']['en']!!}</p>
		</div>
	</div>
</section>

<section class="team_section">
	<div class="container">
		<h6>Experts</h6>
		<h4 class="titles">Our amazing <br>Team</h4>
		<div class="row" ng-repeat="repeat_nd in includes.global.many[3]['team_members']">
			<a href="/member/<%repeat_nd.id%>/<%repeat_nd.slugable.en%>">
				<div class="col-md-4">
					<img ng-src="/img/manjakos/<%repeat_nd['collections']['image']%>" alt="">
				</div>
			</a>
			<div class="col-md-8">
				<h3 class="titles"><%repeat_nd['collections']['name']['en']%> </h3>
				<p ng-bind-html="repeat_nd['collections']['biography']['en']"></p>
			</div>
		</div>
	</div>
</section>
@include('includes.stay_in')
@endsection