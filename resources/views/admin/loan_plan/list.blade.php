@extends('admin.layouts._app')

@section('content')

<section class="section">

    @include('message')
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><a href="{{url('admin/loan_plan/add')}}" class="btn btn-primary">Add Loan Plan </a></h5>
            
           <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th data-type="date" data-format="YYYY/DD/MM">Registered Date</th>
                  <th>Months</th>
                  <th>Interest Percentage(%)</th>
                  <th>Penalty Rate</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($getRecord as $getRecord)
                <tr>
                <td>{{ date('d-m-Y',strtotime($getRecord->created_at)) }}</td>
                <td>{{$getRecord->Months}}</td>
                <td>{{$getRecord->interest_percentage }}</td>
                <td>{{$getRecord->penalty_rate }}</td>
                <td> 
                    <a href="{{ url('admin/loan_plan/edit/'.$getRecord->id) }}" class="btn btn-success"> <i class="bi bi-pencil-square"></i> </a>
                    <a href="{{ url('admin/loan_plan/delete/'.$getRecord->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash"></i></a>
                    
                </td>
                </tr>
                @endforeach
                
              </tbody>
              
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


@endsection