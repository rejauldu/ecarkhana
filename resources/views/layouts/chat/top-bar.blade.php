<header class="main-header">
	@computer
	<!-- Logo -->
	<a href="{{ url('/') }}" class="logo">
		<!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><b>O</b>B</span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg">{{ config('app.name') }}</span>
	</a>
	@endcomputer
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-expand-sm navbar-static-top theme-nav clearfix">
		<!-- Sidebar toggle button-->
		<a href="#" class="nav-link py-0 sidebar-toggle py-0" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		@mobile
		<a href="{{ url('/') }}" class="btn border border-primary text-light shadow-sm position-absolute right-0">
			{{ config('app.name') }}
		</a>
		@endmobile
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav ml-auto">
				<!-- Messages: style can be found in dropdown.less-->
				<li class="nav-item messages-menu" id="app">
					<a href="{{ route('chats.index') }}" class="nav-link py-0">
						<i class="fa fa-envelope-o"></i>
						<chat-counter :user='@json($user)' :partner='@if(isset($partner)) @json($partner) @else "{}" @endif' :total_unread_message="@json($total_unread_message)"></chat-counter>
					</a>
				</li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="nav-item dropdown user user-menu">
					<a href="#" class="nav-link py-0 dropdown-toggle" data-toggle="dropdown">
						<img src="{{ url('/') }}/assets/profile/{{ $user->photo }}" class="user-image" alt="User Image">
						<span class="hidden-xs">{{ $user->name ?? '' }}</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<!-- User image -->
						<li class="user-header">
							<img src="{{ url('/') }}/assets/profile/{{ $user->photo }}" class="img-circle" alt="User Image">
							<p>{{ $user->name ?? '' }} <small>{{ __('Since') }} {{ $user->created_at->date ?? '' }}</small></p>
						</li>
						<!-- Menu Body -->
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="{{ route('users.edit', $user->id ?? '') }}" class="btn btn-default btn-flat">{{ __('Profile') }}</a>
							</div>
							<div class="pull-right">
								<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">{{ __('Logout') }}</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>