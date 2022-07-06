<div id="kt_aside" class="aside hijau aside-dark aside-hoverable" data-kt-drawer="true"
	data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
	data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
	data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
	<div class="aside-logo hijau flex-column-auto" id="kt_aside_logo">
		<a href="#">
			<img alt="Logo" src="{{ asset('img/Logo.PNG') }}" class="h-50px logo" />
		</a>
	</div>
	<div class="aside-menu flex-column-fluid">
		<div class="my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
			data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
			data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
			data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
			<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
				id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
									viewBox="0 0 24 24" fill="none">
									<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
									<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
										fill="currentColor" />
									<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
										fill="currentColor" />
									<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
										fill="currentColor" />
								</svg>
							</span>
						</span>
						<span class="menu-title ">Dashboards</span>
						<span class="menu-arrow"></span>
					</span>
					<div class="menu-sub menu-sub-accordion menu-active-bg">
						<div class="menu-item">
							<a class="menu-link" href="{{ route('dashboard.index') }}">
								<span class="menu-bullet">
									<span class="bullet bullet-dot"></span>
								</span>
								<span class="menu-title">Dashboard</span>
							</a>
						</div>
					</div>
				</div>
				<div class="menu-item">
					<div class="menu-content pt-8 pb-2">
						<span class="menu-section text-muted text-uppercase fs-8 ls-1">Apps</span>
					</div>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<a href="{{ route('orders.index') }}"><span class="menu-link">
						<span class="menu-icon fs-5">
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.3" d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z" fill="currentColor"></path>
									<path d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z" fill="currentColor"></path>
								</svg>
							</span>
						</span>
						<span class="menu-title">Orders</span>
					</span></a>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<a href="{{ route('recap.index') }}"><span class="menu-link">
						<span class="menu-icon">
							<!--begin::Svg Icon | path: icons/duotune/files/fil025.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.3" d="M14 2H6C4.89543 2 4 2.89543 4 4V20C4 21.1046 4.89543 22 6 22H18C19.1046 22 20 21.1046 20 20V8L14 2Z" fill="currentColor"></path>
									<path d="M20 8L14 2V6C14 7.10457 14.8954 8 16 8H20Z" fill="currentColor"></path>
									<path d="M10.3629 14.0084L8.92108 12.6429C8.57518 12.3153 8.03352 12.3153 7.68761 12.6429C7.31405 12.9967 7.31405 13.5915 7.68761 13.9453L10.2254 16.3488C10.6111 16.714 11.215 16.714 11.6007 16.3488L16.3124 11.8865C16.6859 11.5327 16.6859 10.9379 16.3124 10.5841C15.9665 10.2565 15.4248 10.2565 15.0789 10.5841L11.4631 14.0084C11.1546 14.3006 10.6715 14.3006 10.3629 14.0084Z" fill="currentColor"></path>
								</svg>
							</span>
							<!--end::Svg Icon-->
						</span>
						<span class="menu-title">Rekap</span>
					</span></a>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<a href="{{ route('project.index') }}"><span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<i class="fonticon-link fs-2"></i>
							</span>
						</span>
						<span class="menu-title">Project</span>
					</span></a>
				</div>
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<a href="{{ route('skill.index') }}"><span class="menu-link">
						<span class="menu-icon">
							<span class="svg-icon svg-icon-2">
								<i class="fonticon-like fs-2"></i>
							</span>
						</span>
						<span class="menu-title">Skill</span>
					</span></a>
				</div>
			</div>
		</div>
	</div>
</div>