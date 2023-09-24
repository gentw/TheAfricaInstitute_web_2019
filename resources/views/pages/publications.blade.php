@extends('index')
@section('title_and_meta')

@endsection
@section('content')

<section class="publication_holder">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="titles">sign up for newsletter</h2>
                <p>Register here to receive news about events at The Africa Institute. </p>
                <input class="inputtext_a" type="text" placeholder="First Name">
                <input class="inputtext_a" type="text" placeholder="Last Name">
                <input class="inputtext_a" type="text" placeholder="Phone">
                <input class="inputtext_a" type="text" placeholder="Email Address">

                <a href="#" class="hbtn hover_yell">Send</a>
                <h5>How did you hear about us?</h5>
                <div class="check_holder">
                    <div class="radio-button">
                        <input id="radio-1" name="radio" type="radio" checked>
                        <label for="radio-1" class="radio-label">Google</label>
                    </div>
                    <div class="radio-button">
                        <input id="radio-2" name="radio" type="radio">
                        <label for="radio-2" class="radio-label">TV Ads</label>
                    </div>
                    <div class="radio-button">
                        <input id="radio-3" name="radio" type="radio">
                        <label for="radio-3" class="radio-label">Facebook</label>
                    </div>
                    <div class="radio-button">
                        <input id="radio-4" name="radio" type="radio">
                        <label for="radio-4" class="radio-label">Twitter</label>
                    </div>
                    <div class="radio-button">
                        <input id="radio-5" name="radio" type="radio">
                        <label for="radio-5" class="radio-label">Friends</label>
                    </div>
                </div>
                <hr>
                <div class="row social_row">
                    <div class="col-md-6">
                        <h5>Contact Us</h5>
                        <p><a href="mailto:info@theafricainstitute.org "> <i class="fas fa-envelope"></i>info@theafricainstitute.org </a></p>
                        <p><a href="tel:+38 45 556 887"> <i class="fas fa-phone"></i>+38 45 556 887</a></p>
                    </div>
                    <div class="col-md-6">
                        <h5>Social Media</h5>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-linkedin"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <img src="img/Mask Group 7.jpg" alt="" srcset="">
            </div>
        </div>
    </div>
</section>
@include('includes.stay_in')
@endsection