@extends('admin.layouts._app')

@section('content')
<h1>Loan User List</h1>
@include('message')
<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><a href="{{url('admin/loan_user/add')}}" class="btn btn-primary">Add New Loan User</a></h5>
          
         <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th data-type="date" data-format="YYYY/DD/MM">Registered Date</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address </th>
                <th>Contact</th>
                <th>Email</th>
                <th>Tax ID</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($getRecord as $getRecord)
              <tr>
              <td>{{ date('d-m-Y',strtotime($getRecord->created_at)) }}</td>
              <td>{{$getRecord->first_name}}</td>
              <td>{{$getRecord->last_name}}</td>
              <td>{{$getRecord->address}}</td>
              <td>{{$getRecord->contact}}</td>
              <td>{{$getRecord->email}}</td>
              <td>{{$getRecord->tax_id}}</td>
              
              <td> 
                  <a href="{{ url('admin/loan_user/edit/'.$getRecord->id) }}" class="btn btn-success"> <i class="bi bi-pencil-square"></i> </a>
                  <a href="{{ url('admin/loan_user/delete/'.$getRecord->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash"></i></a>
                  
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