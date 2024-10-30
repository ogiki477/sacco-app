@extends('admin.layouts._app')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-16">
      @include('message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Profile</h5>
           
            <!-- General Form Elements -->
            <form  action="{{ url('admin/profile/update')}}" method="POST"  class="form-control" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">FirstName </label>
                <div class="col-sm-10">
                  <input type="text" name="first_name" class="form-control" required value="{{ $getRecord->first_name }} ">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">LastName </label>
                <div class="col-sm-10">
                  <input type="text"  name="last_name" class="form-control" required value="{{ $getRecord->last_name}} ">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Username </label>
                <div class="col-sm-10">
                  <input type="text" name="username"  class="form-control" required value="{{ $getRecord->username }} ">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="col-sm-10">
                  <input type="number"  value="{{ $getRecord->mobile_number}}" name="mobile_number" class="form-control"  oninput="javascript: this.value = this.value.replace(/[^0-9]/g,''); 
                  if(this.value.length > this.maxlength) this.value = this.value.slice(0, this.maxlength);" maxlength = "10">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Email </label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" required value="{{ $getRecord->email}} ">
                  <span style="color: red;">{{ $errors->first('email') }}</span>
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" name="password" class="form-control"  value="{{ $getRecord->password }} ">
                  (Leave blank if you are not changing your password)
                  <span style="color: red;">{{ $errors->first('password') }}</span>
                </div>
              </div>
             
             
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                  <input type="date" name="dob" class="form-control" required value="{{ $getRecord->dob}}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Profile Picture</label>
                <div class="col-sm-10">
                  <input class="form-control" name="profile_picture" type="file" id="formFile">
                  @if(!empty($getRecord->profile_picture))
                  <img src="{{$getRecord->getProfilePic() }}" height="100px" width="100px" alt="">
                  @endif
                </div>
              </div>
              

              
              
              <div class="row mb-16">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      
    </div>
  </section>
@endsection

