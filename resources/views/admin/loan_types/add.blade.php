@extends('admin.layouts._app')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-16">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add Loan</h5>
           
            <!-- General Form Elements -->
            <form  action="{{url('admin/loan_types/add')}}" method="POST"  class="form-control" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Loan Name<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="text" name="type_name" class="form-control" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Description<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="text"  name="description" class="form-control" required>
                  <div class="invalid-feedback">Please enter a description</div>
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

