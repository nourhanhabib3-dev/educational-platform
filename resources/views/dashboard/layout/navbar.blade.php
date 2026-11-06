<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Educational-platform Admin </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('dash')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('dash')}}/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('dash')}}/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('dash')}}/images/favicon.ico" />
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">

          <a class="navbar-brand d-flex align-items-center gap-2 px-3 py-2"
           href="#">
               <div style="color: #5a2d82;" class=" rounded-3 p-2 d-flex align-items-center justify-content-center ">
                    <i class="mdi mdi-school menu-icon fs-4"></i>
                    <h3 class="font-weight-bold text-dark mb-0">Edu<span style="color: #9750da;"> - Platform</span></h3>
               </div>
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('dash')}}/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile ">
              <a href="#" class="nav-link">
                <div class="nav-profile-img">
                    @if(Auth::guard('manage')->check())
                        <img src="{{asset('storage/' .Auth::guard('manage')->user()->img)}}" alt="image">
                    @elseif (Auth::guard('tech')->check())
                        <img src="{{asset('storage/' .Auth::guard('tech')->user()->img)}}" alt="image">
                    @endif
                  <span class="availability-status online"></span>
                </div>
                <div class="nav-profile-text">
                    @if (Auth::guard('manage')->check())
                        <span class="font-weight-bold mb-2">{{Auth::guard('manage')->user()->name}} @else {{Auth::guard('tech')->user()->name}}</span>
                    @endif

                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                  <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
              </div>
            </li>
            {{-- icons --}}

            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="{{route('logout')}}">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
          </ul>
        </div>
      </nav>




