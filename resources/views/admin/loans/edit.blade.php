@extends('admin.layouts._app')

@section('content')
  <section class="section">
    <div class="row">
      <div class="col-lg-16">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Loan</h5>
           
            <!-- General Form Elements -->
            <form  action="{{url('admin/loans/edit/'.$getRecord->id)}}" method="POST"  class="form-control" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Loan User<span style="color: red">*</span> </label>
                    <div class="col-sm-10">
                      <select name="user_id" id="" class="form-select" required >
                        <option value="">Select Loan User</option>
                        @foreach($getLoanUser as $getLoanUser)
                        <option {{ ($getLoanUser->id== $getRecord->user_id) ? 'selected' : '' }} value="{{$getLoanUser->id}}">{{$getLoanUser->first_name}} {{$getLoanUser->last_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Loan Type<span style="color: red">*</span> </label>
                    <div class="col-sm-10">
                      <select name="loan_types_id" id="" class="form-select" required >
                        <option value="">Choose Loan Type</option>
                          @foreach( $getLoanType as $getLoanType)
                          <option {{($getLoanType->id == $getRecord->loan_types_id) ? 'selected' : ''}} value="{{ $getLoanType->id}}">{{ $getLoanType->type_name}}</option>
                          @endforeach
                      </select>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Loan Staff<span style="color: red">*</span> </label>
                    <div class="col-sm-10">
                      <select name="staff_id" id="" class="form-select" required >
                        <option value="">Select Loan Staff</option>
                        @foreach($getLoanStaff as $getLoanStaff)
                        <option {{ ($getLoanStaff->id == $getRecord->staff_id) ? 'selected' : ''}} value="{{$getLoanStaff->id}}">{{$getLoanStaff->first_name}} {{$getLoanStaff->last_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Loan Plan<span style="color: red">*</span> </label>
                    <div class="col-sm-10">
                      <select name="loan_plans_id" id="" class="form-select" required >
                        <option value="">Choose Loan Plan</option>
                        @foreach($getLoanPlan as $getLoanPlan)
                        <option {{($getLoanPlan->id == $getRecord->loan_plans_id) ? 'selected' : ''}} value="{{ $getLoanPlan->id }}">{{ $getLoanPlan->Months }} [{{ $getLoanPlan->interest_percentage }}]</option>
                        @endforeach
                        
    
                      </select>
                    </div>
                  </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Loan Amount<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <input type="number" value="{{ $getRecord->loan_amount}}"  name="loan_amount" class="form-control"required>
                </div>
              </div>

              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Purpose<span style="color: red">*</span> </label>
                <div class="col-sm-10">
                  <textarea name="purpose" class="form-control" >{{ $getRecord->purpose}}</textarea>
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

