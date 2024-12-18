 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    @if(Auth::user()->is_role == '1')

      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2) == 'dashboard') @else collapsed @endif" href="{{url('admin/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'staff') @else collapsed @endif" href="{{url('admin/staff/list')}}">
          <i class="bi bi-person"></i>
          <span>Staff</span>
        </a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_types') @else collapsed @endif" href="{{url('admin/loan_types/list')}}">
          <i class="bi bi-currency-dollar"></i>
          <span>Loan Types</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_plan') @else collapsed @endif" href="{{url('admin/loan_plan/list')}}">
          <i class="bi bi-cash"></i>
          <span>Loan Plan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan') @else collapsed @endif" href="{{url('admin/loans/list')}}">
          <i class="bi bi-backpack"></i>
          <span>Loan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'loan_user') @else collapsed @endif" href="{{url('admin/loan_user/list')}}">
          <i class="bi bi-gem"></i>
          <span>Loan User</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'profile') @else collapsed @endif" href="{{url('admin/profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'logo') @else collapsed @endif" href="{{url('admin/logo')}}">
          <i class="bi bi-card-image"></i>
          <span>Logo</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{url('logout')}}">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log Out</span>
        </a>
      </li><!-- End Login Page Nav -->

    @endif


    @if(Auth::user()->is_role == '0')

    <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2) == 'dashboard') @else collapsed @endif" href="{{url('staff/dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link  @if(Request::segment(2) == 'loan_user') @else collapsed @endif" href="{{url('staff/loan_user/list')}}">
          <i class="bi bi-bank"></i>
          <span>Loan User</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link @if(Request::segment(2) == 'profile') @else collapsed @endif" href="{{url('staff/profile')}}">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>


    @endif

     
    
   
    </ul>

  </aside><!-- End Sidebar-->