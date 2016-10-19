<div class="sidebar" data-color="blue" data-image="/creativetim/img/sidebar-4.jpg">
	<div class="sidebar-wrapper">
		<div class="logo">
			<a href="{{route('get_hightension')}}" class="simple-text">High Tension</a>
		</div>

		<ul class="nav">
		<li class="@yield('substation_active')">
				<a href="{{route('get_subsection')}}">
					<i class="pe-7s-add-user"></i>
					<p>Add Sub-Station</p>
				</a>
			</li>
		<li class="@yield('tariff_active')">
				<a href="{{route('get_tariff')}}">
					<i class="pe-7s-add-user"></i>
					<p>Tariff</p>
				</a>
			</li>	
			<li class="@yield('category_active')">
				<a href="{{route('get_category')}}">
					<i class="pe-7s-add-user"></i>
					<p>Category</p>
				</a>
			</li>	
			<li class="@yield('areaoffice_active')">
				<a href="{{route('get_area_office')}}">
					<i class="pe-7s-add-user"></i>
					<p>Add Area Office</p>
				</a>
			</li>		
			
			<li class="@yield('feeder_active')">
				<a href="{{route('get_feeder')}}">
					<i class="pe-7s-add-user"></i>
					<p>Add Feeder</p>
				</a>
			</li>
			<li class="@yield('hightension_active')">
				<a href="{{route('get_hightension')}}">
					<i class="pe-7s-add-user"></i>
					<p>Add High Tension</p>
				</a>
			</li>	
			<li class="@yield('transformer_active')">
				<a href="{{route('get_transformer')}}">
					<i class="pe-7s-add-user"></i>
					<p>Add Transformer</p>
				</a>
			</li>
			<li class="@yield('setting_active')">
				<a href="{{route('get_setting')}}">
					<i class="pe-7s-add-user"></i>
					<p>Settings</p>
				</a>
			</li>				
			<li class="@yield('bookcode_active')">
				<a href="{{route('get_bookcode')}}">
					<i class="pe-7s-add-user"></i>
					<p>Book Code</p>
				</a>
			</li>
			<li class="@yield('transformer_active')">
				<a href="{{route('get_transformer_bookcode')}}">
					<i class="pe-7s-add-user"></i>
					<p>Add Transformer Book Code</p>
				</a>
			</li>
		</ul>
	</div>
</div>
