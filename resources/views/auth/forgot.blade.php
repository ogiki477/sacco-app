@extends('layouts.app')


@section('content')


<div class="card mb-3">

    <div class="card-body">

      <div class="pt-4 pb-2">
        @include('message')
        <h5 class="card-title text-center pb-0 fs-4">Reset Password</h5>
        <p class="text-center small">Enter your email to reset your password</p>
      </div>

      <form  action="{{ url('forgot')}}" method="post"   class="row g-3 needs-validation" novalidate>
       
        {{ csrf_field() }}

        <div class="col-12">
          <label class="form-label">Your Email</label>
          <input type="email" name="email" class="form-control" required>
          <div class="invalid-feedback">Please enter a valid Email adddress!</div>
        </div>
        
        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Submit</button>
        </div>

        <div class="col-12">
            <p class="small mb-0">Already have an Account? <a href="{{url('')}}">Log in</a></p>
          </div>
        
      </form>

    </div>
  </div>


  


@endsection