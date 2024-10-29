@extends('admin.layouts._app')

@section('content')
<h1>Loans</h1>
@include('message')
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><a href="{{url('admin/loans/add')}}" class="btn btn-primary">Add New Loan Application</a></h5>
          
         <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th data-type="date" data-format="YYYY/DD/MM">Registered Date</th>
                <th>Username</th>
                <th>Loan Types</th>
                <th>Loan Plans</th>
                <th>Loan Staff</th>
                <th>Loan Amounts</th>
                <th>Purpose</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($getRecord as $getRecord)
              <tr>
              <td>{{ date('d-m-Y',strtotime($getRecord->created_at)) }}</td>
              <td>{{$getRecord->user_id}}</td>
              <td>{{$getRecord->loan_types_id}}</td>
              <td>{{$getRecord->loan_plans_id}}</td>
              <td>{{$getRecord->staff_id}}</td>
              <td>{{$getRecord->loan_amount}}</td>
              <td>{{$getRecord->purpose}}</td>
              
              <td> 
                  <a href="{{ url('admin/loans/edit/'.$getRecord->id) }}" class="btn btn-success"> <i class="bi bi-pencil-square"></i> </a>
                  <a href="{{ url('admin/loans/delete/'.$getRecord->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash"></i></a>
                  
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