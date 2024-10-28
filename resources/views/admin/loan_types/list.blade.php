@extends('admin.layouts._app')

@section('content')
<h1>Loan List</h1>
@include('message')



<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title"><a href="{{url('admin/loan_types/add')}}" class="btn btn-primary">Add Loan</a></h5>
          
         <!-- Table with stripped rows -->
          <table class="table datatable">
            <thead>
              <tr>
                <th data-type="date" data-format="YYYY/DD/MM">Registered Date</th>
                <th>Loan Type</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($getRecord as $getRecord)
              <tr>
              <td>{{ date('d-m-Y',strtotime($getRecord->created_at)) }}</td>
              <td>{{$getRecord->type_name}}</td>
              <td>{{$getRecord->description}}</td>
              <td> 
                  <a href="{{ url('admin/loan_type/edit/'.$getRecord->id) }}" class="btn btn-success"> <i class="bi bi-pencil-square"></i> </a>
                  <a href="{{ url('admin/loan_type/delete/'.$getRecord->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')"><i class="bi bi-trash"></i></a>
                  
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