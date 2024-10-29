@extends('admin.layouts._app')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-16">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Loan User</h5>
           
            <!-- General Form Elements -->
            <form  action="{{url('admin/loan_user/add')}}" method="POST"  class="form-control" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">First Name<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                 <input type="text" name="first_name" class="form-control" value="{{old('first_name') }}">
                </div>
              </div>
              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Last Name<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                 <input type="text" name="last_name" class="form-control" value="{{ old("last_name")}}">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Address<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                 <textarea type="text" name="address" class="form-control"></textarea>
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Contact<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                    <input type="number" name="contact" value="{{ old('contact')}}" oninput="javascript: this.value = this.value.replace(/[^0-9]/g,''); 
                    if(this.value.length > this.maxlength) this.value = this.value.slice(0, this.maxlength);" maxlength = "10"  class="form-control" required >
                  </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Email<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                 <input type="email" name="email" class="form-control">
                 <span style="color: red;">{{ $errors->first('email') }}</span>
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tax ID<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                 <input type="text" name="tax_id" class="form-control" value="{{ old('tax_id')}}">
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

