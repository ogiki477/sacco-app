@extends('admin.layouts._app')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-16">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Staff</h5>
           
            <!-- General Form Elements -->
            <form  action="{{url('admin/staff/add')}}" method="POST"  class="form-control" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">FirstName <span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="text" name="first_name" class="form-control" required value="{{ old("first_name")}} ">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">LastName <span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="text"  name="last_name" class="form-control" required value="{{ old("last_name")}} ">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Username <span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="text" name="username"  class="form-control" required value="{{ old("username")}} ">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Mobile Number</label>
                <div class="col-sm-10">
                  <input type="number"  name="mobile_number" class="form-control"  oninput="javascript: this.value = this.value.replace(/[^0-9]/g,''); 
                  if(this.value.length > this.maxlength) this.value = this.value.slice(0, this.maxlength);" maxlength = "10">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Email <span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="email" name="email" class="form-control" required value="{{ old("email")}} ">
                  <span style="color: red;">{{ $errors->first('email') }}</span>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Role<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <select name="is_role" id="" class="form-select" required >
                    <option value="">Choose Role</option>
                    <option value="0">Staff</option>
                    <option value="1">Admin</option>

                  </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                  <input type="date" name="dob" class="form-control" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Profile Picture</label>
                <div class="col-sm-10">
                  <input class="form-control" name="profile_picture" type="file" id="formFile">
                </div>
              </div>
              

              
              
              <div class="row mb-16">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      
    </div>
  </section>
@endsection

