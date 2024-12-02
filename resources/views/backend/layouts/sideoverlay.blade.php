<!-- Side Overlay-->
<aside id="side-overlay">
<!-- Side Header -->
<div class="content-header">
  <!-- User Avatar -->
  <a class="img-link me-2" href="/admin">
    <img class="img-avatar img-avatar32" src="/backend/assets/media/avatars/avatar15.jpg" alt="">
  </a>
  <!-- END User Avatar -->

  <!-- User Info -->
  <a class="link-fx text-body-color-dark fw-semibold fs-sm" href="/admin">
    {{Auth::user()->name}}
  </a>
  <!-- END User Info -->

  <!-- Close Side Overlay -->
  <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
  <button type="button" class="btn btn-sm btn-alt-danger ms-auto" data-toggle="layout" data-action="side_overlay_close">
    <i class="fa fa-fw fa-times"></i>
  </button>
  <!-- END Close Side Overlay -->
</div>
<!-- END Side Header -->

<!-- Side Content -->
<div class="content-side">
  <!-- Profile -->
  <div class="block pull-x">
    <div class="block-header bg-body-light">
      <h3 class="block-title">
        <i class="fa fa-fw fa-pencil-alt opacity-50 me-1"></i> Profile
      </h3>
      <div class="block-options">
        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"></button>
      </div>
    </div>
    <div class="block-content block-content-full">
      <form role="form" action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="side-overlay-profile-name">Name</label>
          <div class="input-group">
            <input type="text" class="form-control" id="side-overlay-profile-name" name="name" placeholder="Your name.." value="{{Auth::user()->name}}">
            <span class="input-group-text">
              <i class="fa fa-user"></i>
            </span>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="side-overlay-profile-email">Email</label>
          <div class="input-group">
            <input type="email" class="form-control" id="side-overlay-profile-email" name="email" placeholder="Your email.." value="{{Auth::user()->email}}">
            <span class="input-group-text">
              <i class="fa fa-envelope"></i>
            </span>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label" for="side-overlay-profile-password">New Password</label>
          <div class="input-group">
            <input type="password" class="form-control" id="side-overlay-profile-password" name="password" placeholder="Password..">
            <span class="input-group-text">
              <i class="fa fa-asterisk"></i>
            </span>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <button type="submit" class="btn btn-alt-primary">
              <i class="fa fa-sync opacity-50 me-1"></i> Update
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!-- END Profile -->
</div>
<!-- END Side Content -->
</aside>
<!-- END Side Overlay -->