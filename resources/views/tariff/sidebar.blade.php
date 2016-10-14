<div class="sidebar" data-color="blue" data-image="/creativetim/img/sidebar-4.jpg">
	<div class="sidebar-wrapper">
		<div class="logo">
			<a href="{{route('register_service')}}" class="simple-text">ACCOUNT</a>
		</div>

		<ul class="nav">
			<li class="@yield('service_active')">
				<a href="{{route('register_service')}}">
					<i class="pe-7s-add-user"></i>
					<p>ADD SERVICE</p>
				</a>
			</li>
			<li class="@yield('all_service_active')">
				<a href="{{route('all_services')}}">
					<i class="pe-7s-add-user"></i>
					<p>VIEW SERVICES</p>
				</a>
			</li>
			<li class="@yield('inventory_active')">
				<a href="{{route('register_inventory')}}">
					<i class="pe-7s-cash"></i>
					<p>ADD INVENTORY</p>
				</a>
			</li>
			
			<li class="@yield('all_inventory_active')">
				<a href="{{route('all_inventory')}}">
					<i class="pe-7s-cash"></i>
					<p>VIEW INVENTORY</p>
				</a>
			</li>
			
			<li class="@yield('payment_active')">
				<a href="{{route('recieve_payment')}}">
				<!--<a href="{{ route('search_service') }}">-->
					<i class="pe-7s-cash"></i>
					<p>RECIEVE PAYMENT</p>
				</a>
			</li>
			<li class="@yield('payment_history_active')">
				<a href="{{route('payment_history')}}">
					<i class="pe-7s-cash"></i>
					<p>PAYMENT HISTORY</p>
				</a>
			</li>
			
		</ul>
	</div>
</div>
