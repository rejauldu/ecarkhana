<div class="row">
	<div class="col-md-12 col-12 col-sm-12">
		<section class="search-result-item p-0 overflow-hidden">
			<a class="image-link" href="#"><img class="img-thumbnail w-100" alt="" src="{{ asset('/assets/profile') }}/{{ $user->photo }}"> </a>
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
								<div class="user-stats h-100">
									<h2>{{ $sell ?? 0 }}</h2>
									<small>Ad Sold</small>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-12">
								<div class="user-stats h-100">
									<h2>{{ $user->products->count() }}</h2>
									<small>Total Listings</small>
								</div>
							</div>
							<div class="col-md-4 col-sm-4 col-12">
								<div class="user-stats h-100">
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
					<a href="{{ route('profile') }}">
						<div class="menu-name"> Profile </div>
					</a>
				</li>
				<li @if(isset($ad) && $ad == 'active') class="active" @endif>
					<a href="{{ route('ads') }}">
						<div class="menu-name">My Ads</div>
					</a>
				</li>
                <li @if(isset($incomplete) && $incomplete == 'active') class="active" @endif>
                    <a href="{{ route('orders.incomplete') }}">
                        <div class="menu-name">Incomplete orders</div>
                    </a>
                </li>
				<li>
					<a href="{{ route('chats.index') }}">
						<div class="menu-name">Messages</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
