
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html sidebar=========== -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    @if (Auth::guard('tech')->check())
                     <img src="{{asset('storage/' .Auth::guard('tech')->user()->img)}}" alt="profile">
                    @elseif (Auth::guard('manage')->check())
                     <img src="{{asset('storage/' .Auth::guard('manage')->user()->img)}}" alt="profile">
                    @endif
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    @if (Auth::guard('manage')->check())
                     <span class="font-weight-bold mb-2">{{Auth::guard('manage')->user()->name}}</span>
                     <span class="text-secondary text-small">Manager</span>
                    @elseif (Auth::guard('tech')->check())
                     <span class="font-weight-bold mb-2">{{Auth::guard('tech')->user()->name}}</span>
                     <span class="text-secondary text-small">Teacher</span>

                    @endif
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>

            @if (Auth::guard('manage')->check())
            <li class="nav-item">
              <a class="nav-link" href="{{route('index')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('year.index')}}">
                <span class="menu-title">Year</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{route('sub.index')}}">
                <span class="menu-title">Subjects</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="{{route('student.index')}}">
                <span class="menu-title">Student</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('teacher.index')}}">
                <span class="menu-title">Teachers</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('manager.index')}}">
                <span class="menu-title">Manager</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>

            @endif
            @if(Auth::guard('tech')->check())
              <li class="nav-item">
              <a class="nav-link" href="{{route('index2')}}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
              </a>
            </li>
            @endif
            @if (Auth::guard('tech')->check() || Auth::guard('manage')->check())

            <li class="nav-item">
              <a class="nav-link" href="{{route('course.index')}}">
                <span class="menu-title">Courses</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('lesson.index')}}">
                <span class="menu-title">Lessons</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li>

            {{-- <li class="nav-item">
              <a class="nav-link" href="{{route('course.lesson.index')}}">
                <span class="menu-title">Lesson</span>
                <i class="mdi mdi-contacts menu-icon"></i>
              </a>
            </li> --}}
            @endif

            <li class="nav-item logout-btn">
              <a class="nav-link" href="{{route('logout')}}">
                <span class="menu-title" style="color: rgb(231, 9, 9); cursor: pointer">Logout</span>
                <i class="mdi mdi-power menu-icon" style="color: rgb(231, 9, 9)"></i>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Sample Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li>

          </ul>
        </nav>


        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
