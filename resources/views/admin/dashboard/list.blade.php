@extends('admin.layouts._app')

@section('content')



    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Admin</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

         <!-- Left side columns -->
         <div class="col-lg-12">
          <div class="row">

         
            
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <a href="{{ url('admin/staff/list')}}">
                <div class="card-body">
                  <h5 class="card-title">Staff And Admin</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getStaffandAdminCount}}</h6>
                    </div>
                  </div>
                </div>
              </a>
             </div>
            </div>

        
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <a href="{{  url('admin/loan_types/list')}}">
                <div class="card-body">
                  <h5 class="card-title">Loan Types</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getloanTypesCount}}</h6>
                    </div>
                  </div>
                </div>
                </a>
              </div>
            </div>


            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <a href="{{  url('admin/loan_plan/list')}}">
                <div class="card-body">
                  <h5 class="card-title">Loan Plans </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-archive"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getloanPlanCount}}</h6>
                      

                    </div>
                  </div>
                </div>
                </a>

              </div>
            </div>


            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <a href="{{  url('admin/loans/list')}}">
                <div class="card-body">
                  <h5 class="card-title">Loans</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-bank"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getloanCount}}</h6>
                      

                    </div>
                  </div>
                </div>
                </a>

              </div>
            </div>





            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <a href="{{  url('admin/loan_user/list')}}">
                <div class="card-body">
                  <h5 class="card-title">Loan Users </h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$getloanUserCount}}</h6>
                      

                    </div>
                  </div>
                </div>
                </a>

              </div>
            </div>





            
           

                </div>
              </div><!-- End Reports -->    

          </div>
        </div><!-- End Left side columns -->

      </div>
   </section>



@endsection