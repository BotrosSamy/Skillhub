<nav id="nav">
				<form id="logout-form" action="{{url('logout')}}" method="post" style="display:none">
				@csrf
				
				</form>
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="{{ url('/') }}">{{__('web.home')}}</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ __('web.Cat') }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
							@foreach ($cats as $cat)
                              <li><a href="{{url("/categories/show/{$cat->id}")}}">
							    {{ $cat->name() }}
							</a></li>
                             @endforeach
                            </ul>
                        </li>
                        <li><a href="{{url("/contact")}}">{{ __('web.Contact')}}</a></li>
						@guest
                        <li><a href="{{url('login')}}">{{ __('web.SignIn')}}</a></li>
                        <li><a href="{{url('register')}}">{{ __('web.SignUp')}}</a></li>
						@endguest
					    
					@auth
						@if(Auth::user()->role->name=='student')
							<li><a  href="{{url('profile')}}">{{ __('web.Profile')}}</a></li>
						
						@else
                        <li><a  href="{{url('dashboard')}}">{{ __('web.dashboard')}}</a></li>
						@endif

						<li><a id="logout-link" href="#">{{ __('web.SignOut')}}</a></li>

					@endauth
					    <!-- <input type="submit" value="{{__('web.SignOut')}}"> -->

					
						@if(App::getlocale()=="ar")
						<li><a href="{{url('lang/set/en')}}">EN</a></li>
						@else
						<li><a href="{{url('lang/set/ar')}}">ع</a></li>
						@endif
						
					</ul>
			</nav>