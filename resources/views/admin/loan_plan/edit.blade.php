@extends('admin.layouts._app')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-16">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Loan Plan</h5>
           
            <!-- General Form Elements -->
            <form  action="{{url('admin/loan_plan/edit/'.$getRecord->id)}}" method="POST"  class="form-control" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Months<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="text" name="Months" class="form-control" required  value="{{ $getRecord->Months }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Interest Percentage<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="text"  name="interest_percentage" class="form-control" required value="{{ $getRecord->interest_percentage }}">
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Penalty Rate<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="text" name="penalty_rate"  class="form-control" required value="{{ $getRecord->penalty_rate }}" >
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

