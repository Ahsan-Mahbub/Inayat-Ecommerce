<!-- Header -->
<header id="page-header">
<!-- Header Content -->
<div class="content-header">
  <!-- Left Section -->
  <div class="space-x-1">
    <!-- Toggle Sidebar -->
    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="sidebar_toggle">
      <i class="fa fa-fw fa-bars"></i>
    </button>

    <a class="btn btn-sm btn-alt-secondary" href="/">
      <i class="fa fa-fw fa-globe"></i>
    </a>
    <!-- END Toggle Sidebar -->
  </div>
  <!-- END Left Section -->

  <!-- Right Section -->
  <div class="space-x-1">
    <a href="{{route('clear.all.caches')}}" class="btn btn-sm btn-danger">
      <i class="fa fa-fw fa-refresh"></i> Clear Cache
    </a>
    <!-- User Dropdown -->
    <div class="dropdown d-inline-block">
      <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user d-sm-none"></i>
        <span class="d-none d-sm-inline-block fw-semibold">{{Auth::user()->name}}</span>
        <i class="fa fa-angle-down opacity-50 ms-1"></i>
      </button>
      <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0" aria-labelledby="page-header-user-dropdown">
        <div class="px-2 py-3 bg-body-light rounded-top">
          <h5 class="h6 text-center mb-0">
            {{Auth::user()->name}}
          </h5>
        </div>
        <div class="p-2">
          <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="javascript:void(0)" data-toggle="layout" data-action="side_overlay_toggle">
            <span>Profile</span>
            <i class="fa fa-fw fa-user opacity-25"></i>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item d-flex align-items-center justify-content-between space-x-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span>Sign Out</span>
            <i class="fa fa-fw fa-sign-out-alt opacity-25"></i>
          </a>
           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
	            @csrf
	        </form>
        </div>
      </div>
    </div>
    <!-- END User Dropdown -->

    <!-- Notifications -->
    <!-- <div class="dropdown d-inline-block">
      <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-flag"></i>
        <span class="text-primary">&bull;</span>
      </button>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications">
        <div class="px-2 py-3 bg-body-light rounded-top">
          <h5 class="h6 text-center mb-0">
            Notifications
          </h5>
        </div>
        <ul class="nav-items my-2 fs-sm">
          <li>
            <a class="text-dark d-flex py-2" href="javascript:void(0)">
              <div class="flex-shrink-0 me-2 ms-3">
                <i class="fa fa-fw fa-check text-success"></i>
              </div>
              <div class="flex-grow-1 pe-2">
                <p class="fw-medium mb-1">You’ve upgraded to a VIP account successfully!</p>
                <div class="text-muted">15 min ago</div>
              </div>
            </a>
          </li>
        </ul>
        <div class="p-2 bg-body-light rounded-bottom">
          <a class="dropdown-item text-center mb-0" href="javascript:void(0)">
            <i class="fa fa-fw fa-flag opacity-50 me-1"></i> View All
          </a>
        </div>
      </div>
    </div> -->
    <!-- END Notifications -->

    <!-- Toggle Side Overlay -->
    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="side_overlay_toggle">
      <i class="fa fa-fw fa-stream"></i>
    </button>
    <!-- END Toggle Side Overlay -->
  </div>
  <!-- END Right Section -->
</div>
<!-- END Header Content -->


<!-- Header Loader -->
<!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
<div id="page-header-loader" class="overlay-header bg-primary">
  <div class="content-header">
    <div class="w-100 text-center">
      <i class="far fa-sun fa-spin text-white"></i>
    </div>
  </div>
</div>
<!-- END Header Loader -->
</header>
<!-- END Header -->