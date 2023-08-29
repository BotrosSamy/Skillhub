@extends('web.layout')
@section('title')
   Profile
 @endsection 

    @section('main')

		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url( {{asset('web/img/page-background.jpg')}} )"></div>
			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
					
							<li class="white-text">Profile</li>
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

			  <table class="table">
                <thead>

                    <tr>
                      <th>Exam Name</th>
                      <th>Score</th>
                      <th>Times (mins.)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->exams as $exam)
                    <tr>
                        <td>{{ $exam->name() }}</td>
                        <td>{{ $exam->pivot->score }}</td>
                        <td>{{ $exam->pivot->time_mins }}</td>
                    </tr>

                    @endforeach
                </tbody>


              </table>

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->
    @endsection

	@section('scripts')
    
   
	@endsection