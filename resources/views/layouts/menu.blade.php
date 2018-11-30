<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">

			<!-- Collapsed Hamburger -->
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<!-- Branding Image -->
			<a class="navbar-brand" href="{{ url('/') }}">
				<img src="{{ asset('images/elements/book-icons.png') }}">
			</a>
		</div>

		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">
				&nbsp;
			</ul>

			<form class="navbar-form navbar-right" action="#" method="POST">
				<div class="form-group form-group-search">
					<input name="search" type="text" class="form-control" placeholder="Look for stories" required="">
					<button type="submit"><i class="fa fa-search"></i></button>
				</div>
			</form>

			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				<li class="navbar-nav-inline">
					<a href="#">TELL A FRIEND</a>
				</li>
				<li class="navbar-nav-inline">
					<a href="#">WRITE A STORY</a>
				</li>
				@guest
					<li class="push-down">
						<a href="#" data-toggle="modal" data-target="#register">SIGN UP</a>
					</li>
					<li class="push-down">
						<a href="#" data-toggle="modal" data-target="#login">SIGN IN</a>
					</li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
							{{ Auth::user()->first_name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu">
							<li>
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>