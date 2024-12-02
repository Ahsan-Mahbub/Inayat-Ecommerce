<div class="col-12 col-md-3">
	<aside>
		<div class="seller-left-sidebar">
			<div class="sidebar-header">
				<div class="seller-img">
					<img  src="{{Auth::guard('customers')->user()->image ? '/' . Auth::guard('customers')->user()->image :  '/demo.svg'}}" alt="customer">
				</div>
				<div class="seller-name">
					{{Auth::guard('customers')->user()->name}}
				</div>
			</div>
			<!-- sidebar with menu -->
			<div class="seller-sidebar-content">
				<div class="nav-container">
					<ul class="seller-main-menu-navigation">
						<li>
							<a href="/customer/dashboard">
						       <i class="fa fa-dashboard"></i>
						       Dashboard	
						    </a>
					    </li>
					    <li>
							<a href="/customer/all-orders">
						       <i class="fa fa-shopping-cart"></i>
						       All Orders
						    </a>
					    </li>
					    <li>
							<a href="/customer/profile">
						       <i class="fa fa-user"></i>
						       Profile	
						    </a>
					    </li>
					    <li>
							<a class="nav-link" href="{{ route('logout') }}" 
						    onclick="event.preventDefault();
						    document.getElementById('logout-form').submit();">
						    <i class="fa fa-sign-out"></i>
						    {{ __('Logout') }}
						    </a>
						    <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
						    @csrf </form>
					    </li>
					</ul>
				</div>
			</div>

		</div>
	</aside> 
</div>