@extends('index')
@section('title_and_meta')

@endsection
@section('content')
<section class="intern_cover about_main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <p>ABOUT US</p>
                <h5 class="titles">{{$one['cover_career']['collections']['title']['en']}}</h5>
            </div>
            <div class="col-md-6">
                <img src="{{ URL::to('/img/manjakos/' . $one['cover_career']['collections']['image'])}}" alt="">
                <div class="nth_after1"></div>
                <div class="nth_after"></div>
            </div>
        </div>
    </div>
</section>

<section class="nd_career_in">
    <div class="container">
        <div class="row" style="margin: 0px;">
            <h2 class="titles">open positions</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div id="accordion">
            <div class="card">
                <div id="headingOne">
                    <div class="toggle_button titles" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Faculty positions
                    </div>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 job_hold_sm" ng-repeat="repeat_nd in includes.global.many[4]['f_career']">
                                <div class="badge"></div>
                                <h5 ng-bind-html="repeat_nd['collections']['position']['en']"></h5>
                                <h3 ng-bind-html="repeat_nd['collections']['info']['en']" class=titles></h3>
                                <a href="#" class="hbtn hover_yell">Apply</a>
                            </div>
                            <div class="col-md-4 job_hold_sm" ng-repeat="repeat_nd in includes.global.many[4]['f_career']">
                                <div class="badge"></div>
                                <h5 ng-bind-html="repeat_nd['collections']['position']['en']"></h5>
                                <h3 ng-bind-html="repeat_nd['collections']['info']['en']" class=titles></h3>
                                <a href="#" class="hbtn hover_yell">Apply</a>
                            </div>
                            <div class="col-md-4 job_hold_sm" ng-repeat="repeat_nd in includes.global.many[4]['f_career']">
                                <div class="badge"></div>
                                <h5 ng-bind-html="repeat_nd['collections']['position']['en']"></h5>
                                <h3 ng-bind-html="repeat_nd['collections']['info']['en']" class=titles></h3>
                                <a href="#" class="hbtn hover_yell">Apply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div id="headingTwo">
                    <div class="toggle_button toggle_button2 titles" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        administrative positions
                    </div>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 job_hold_sm" ng-repeat="repeat_nd in includes.global.many[4]['f_career']">
                                <div class="badge"></div>
                                <h5 ng-bind-html="repeat_nd['collections']['position']['en']"></h5>
                                <h3 ng-bind-html="repeat_nd['collections']['info']['en']" class=titles></h3>
                                <a href="#" class="hbtn hover_yell">View Event</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection