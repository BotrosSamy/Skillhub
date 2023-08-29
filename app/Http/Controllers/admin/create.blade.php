@extends('admin.layout')

@section('main')

	<!-- Hero-area -->
    <div class="hero-area section">

        <!-- Backgound Image -->
        <div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/page-background.jpg') }})"></div>
        <!-- /Backgound Image -->

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="hero-area-tree">
                        <li><a href="#">Home</a></li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
    <!-- /Hero-area -->

    <!-- Contact -->
    <div id="contact" class="section">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- login form -->
                <div class="col-md-6 col-md-offset-3">
                    <div class="contact-form">
                        <h4>Add Admin</h4>

                        @include('admin.inc.messages')


                        <form method="POST" action="{{ url("dashboard/admins/store") }}">
                            @csrf
                            <div class="raw">
                                <div class="col-6">
                                    <div class="form-group">
                                                <label>Name</label>
                            <input class="input" type="text" name="name" placeholder="Name">
                                    </div></div>
                                    <div class="col-6">
                                        <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="input" type="email" name="email" placeholder="Email">

                                        </div></div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                        <label>Password</label>
                                                        <input class="input" type="password" name="password" placeholder="Password">
                                            </div></div>

                            <button type="submit" class="main-button icon-button pull-right">Submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
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
