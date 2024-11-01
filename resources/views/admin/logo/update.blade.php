@extends('admin.layouts._app')

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-12">
       @include('message')
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Logo</h5>
           
            <form action="{{ url('admin/logo')}}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
            
            <div class="row mb-3">
               
                <label class="col-sm-2 col-form-label">Logo Name <span  style="color: red"> * </span></label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Logo Image</label>
                <div class="col-sm-10">
                    <input type="file" name="logo" class="form-control">
                </div>
            </div>
            
            <div class="row mb-16">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            
            </form>
            

       

          </div>
        </div>

      </div>

      
    </div>
  </section>
@endsection

