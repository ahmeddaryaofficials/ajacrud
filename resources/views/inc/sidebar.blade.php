<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">

        <span class="ms-1 font-weight-bold text-white">DEMO</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{'users'== request()->path() ? 'active' :''}}" href="{{('/users')}}" >
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link {{'addperson'== request()->path() ? 'active' :''}}" href="{{url('/addperson')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              
            </div>
            <span class="nav-link-text ms-1">Add Users</span>
          </a>
        </li>



      </ul>
    </div>

  </aside>
