@extends('admin.layouts._app')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-16">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Staff</h5>

            <div class="row">
                <div class="col-lg-3 col-md-4 label">Staff ID</div>
                <div class="col-lg-9 col-md-8 ">{{$getRecord->id}}</div> 
            </div>
            

            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">First Name</div>
                <div class="col-lg-9 col-md-8 ">{{$getRecord->first_name}}</div> 
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Last Name</div>
                <div class="col-lg-9 col-md-8 ">{{$getRecord->last_name}}</div> 
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">UserName</div>
                <div class="col-lg-9 col-md-8 ">{{$getRecord->username}}</div> 
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Mobile Number</div>
                <div class="col-lg-9 col-md-8 ">{{$getRecord->mobile_number}}</div> 
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Email</div>
                <div class="col-lg-9 col-md-8 ">{{$getRecord->email}}</div> 
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Role</div>
                <div class="col-lg-9 col-md-8 ">{{ !empty($getRecord->is_role) ? 'Admin' : 'Staff'}}</div> 
            </div>

            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Date Of Birth</div>
                <div class="col-lg-9 col-md-8 ">{{date('d-M-Y',strtotime($getRecord->dob))}}</div> 
            </div>


            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Profile Picture</div>
                <div class="col-lg-9 col-md-8 "> 
                    @if(!empty($getRecord->profile_picture))
                    <img src="{{$getRecord->getProfilePic() }}" height="100px" width="100px" alt="">
                    @endif
                </div> 
            </div>


            <hr>
            <div class="row">
                <div class="col-lg-3 col-md-4 label">Registered Date</div>
                <div class="col-lg-9 col-md-8 ">{{date('d-M-Y',strtotime($getRecord->created_at))}}</div> 
            </div>


        </div>
    </div>

  </div>

  
</div>
</section>
@endsection

