@extends('index')
@section('title_and_meta')

@endsection
@section('content')

<section class="publication_holder contact_edition">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 input_holder_contact">
                <h2 class="titles">drop us your enquiry</h2>
                <input class="inputtext_a" type="text" placeholder="First Name">
                <input class="inputtext_a" type="text" placeholder="Last Name">
                <input class="inputtext_a" type="text" placeholder="Phone">
                <textarea name="" id="" cols="30" rows="4" placeholder="Message"></textarea>

                <a href="#" class="hbtn hover_yell">Send</a>
                <h5>Note: For Next Enquiry, Please Refresh/Reload The Page</h5>
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
            <div class="col-md-5">
                <img src="img/contact_img.png" alt="" srcset="">
            </div>
        </div>
    </div>
</section>

@include('includes.stay_in')
@endsection