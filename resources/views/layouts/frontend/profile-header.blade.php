<div class="row">
	<div class="col-md-12 col-12 col-sm-12">
		<section class="search-result-item">
			<a class="image-link" href="#"><img class="image center-block" alt="" src="{{ asset('/assets/profile') }}/{{ $user->photo }}"> </a>
			<div class="search-result-item-body">
				<div class="row">
					<div class="col-md-5 col-sm-12 col-12">
						<h4 class="search-result-item-heading"><a href="#">{{ $user->name }}</a></h4>
						<p class="description">{{ $user->about }}</p>
						<span class="label label-success">{{ $user->role->name }}</span>
					</div>
					<div class="col-md-7 col-sm-12 col-12">
						<div class="row ad-history">
							<div class="col-md-4 col-sm-4 col-12">
								<div class="user-stats">
									<h2>{{ $sell ?? 0 }}</h2>
									<small>Ad Sold</small>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-12">
								<div class="user-stats">
									<h2>{{ $user->products->count() }}</h2>
									<small>Total Listings</small>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-12">
								<div class="user-stats">
									<h2>{{ $user->orders->count() }}</h2>
									<small>Total Order</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="dashboard-menu-container">
			<ul>
				<li @if(isset($profile) && $profile=='active') class="active" @endif>
					<a href="{{ route('seller-profile', $user->id) }}">
						<div class="menu-name"> Profile </div>
					</a>
				</li>
				<li @if(isset($ad) && $ad == 'active') class="active" @endif>
					<a href="{{ route('seller-my-ad', $user->id) }}">
						<div class="menu-name">My Ads</div>
					</a>
				</li>

				<li>
					<a href="{{ route('seller-message.show', $user->id) }}">
						<div class="menu-name">Messages</div>
					</a>
				</li>
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<div class="menu-name">Logout</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>