@extends('web.layout')
    @section('title')
            forgot Password
    @endsection 


    @section('main')

<!-- Contact -->
<div id="contact" class="section">

<!-- container -->
<div class="container">

    <!-- row -->
    <div class="row">

        <!-- login form -->
        <div class="col-md-6 col-md-offset-3">
            <div class="contact-form">
    
                <h4>Forgot-password</h4>
                @include('web.inc.message')
                <form method="post" action="{{url('forgot-password')}}">
                    @csrf
                    <input class="input" type="email" name="email" placeholder="Email">
              
                    <button type="submit" class="main-button icon-button pull-right">Reset</button>
                </form>
            </div>
        </div>
        <!-- /login form -->

    </div>
    <!-- /row -->

</div>
<!-- /container -->

</div>
<!-- /Contact -->

    @endsection 
