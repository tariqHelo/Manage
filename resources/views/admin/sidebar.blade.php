 {{-- <div class="page-sidebar-wrapper">
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
			 <!-- START SIDEBAR MENU -->
             @php $links =  \App\Models\Linke::get() @endphp
             @foreach($links->where('parent_id' , 0) as $link)
                    <li class="nav-item start">
                        <a href="{{ $link->route=='#'?'#':route($link->route) }}" class="nav-link nav-toggle">
                            <i class="{{ $link->icon }}"></i>
                            <span class="title">{{ $link->title }}</span>
                            @if($link->subMenus->count()>0)
                                <span class="arrow"></span>
                            @endif
                         </a>
							@if($link->subMenus->count()>0)
								<ul class="sub-menu">
									@foreach($link->subMenus->where('show_in_menu',1) as $subMenu)
										<li class="nav-item start">
												<a href="{{ route($subMenu->route) }}" class="nav-link nav-toggle">
													<i class="{{ $subMenu->icon }}"></i>
													<span class="title">{{ $subMenu->title }}</span>
				
												</a>
										</li>
									@endforeach
								</ul>
							@endif
                   </li>
            @endforeach
			<!-- END SIDEBAR MENU -->
		</div>
</div> 
<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="sidebar-search-wrapper">
					<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
					<!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
					<!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
					<form class="sidebar-search " action="extra_search.html" method="POST">
						<a href="javascript:;" class="remove">
						<i class="icon-close"></i>
						</a>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
							<a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
							</span>
						</div>
					</form>
					<!-- END RESPONSIVE QUICK SEARCH FORM -->
				</li>
    {{-- <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
             <!-- START SIDEBAR MENU -->
             @php $links =  \App\Models\Linke::get() @endphp
             @foreach($links->where('parent_id' , 0) as $link)
                    <li class="nav-item start ">
                        <a href="{{ $link->route=='#'?'#':route($link->route) }}" class="nav-link nav-toggle">
                            <i class="{{ $link->icon }}"></i>
                            <span class="title">{{ $link->title }}</span>
                            @if($link->subMenus->count()>0)
                                <span class="arrow"></span>
                            @endif
                        </a>
									@if($link->subMenus->count()>0)
										<ul class="sub-menu">
											@foreach($link->subMenus->where('show_in_menu',1) as $subMenu)
											<li class="nav-item start ">
												<a href="{{ route($subMenu->route) }}" class="nav-link nav-toggle">
													<i class="{{ $subMenu->icon }}"></i>
													<span class="title">{{ $subMenu->title }}</span>
													 @if($subMenu->subMenus->count()>0)
														<span class="arrow"></span>
													@endif
												</a>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
            @endforeach
			<!-- END SIDEBAR MENU -->
        </ul>
    </div> --}}
</div>
    <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">الطلاب</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                <a href="{{route('students')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">كل الطلاب</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                <a href="{{route('groups.index')}}" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">إنشاء مجموعة</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item ">
                        <a href="#" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">إدارة المستخدمين</span>
                                <span class="arrow"></span>
                            </a>
                         <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="{{route('permissions.index')}}" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">الصلاحيات</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{route('roles.index')}}" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">الرولز</span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="{{route('users.index')}}" class="nav-link ">
                                        <i class="icon-graph"></i>
                                        <span class="title">المستخدمين</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="{{route('temp-create')}}" class="nav-link nav-toggle">
                                <i class="icon-puzzle"></i>
                                <span class="title">القوالب</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                <a href="{{route('temp-main')}}" class="nav-link ">
                                        <span class="title">عرض القوالب</span>
                                    </a>
                                </li>
                          
                            </ul>
                        </li>
                      
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>