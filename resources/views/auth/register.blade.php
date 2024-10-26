@extends('layouts.app')


@section('content')


<div class="card mb-3">

    <div class="card-body">

      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
        <p class="text-center small">Enter your personal details to create account</p>
      </div>

      <form  action="{{url('register')}}" method="POST"   class="row g-3 needs-validation" novalidate>
        {{csrf_field()}}
        <div class="col-12">
          <label for="yourName" class="form-label">Your First Name </label>
          <input type="text" name="first_name" class="form-control" id="yourName" required value="{{ old('first_name')}}">
          <div class="invalid-feedback">Please, enter your first name!</div>
        </div>

        <div class="col-12">
          <label for="yourName" class="form-label">Your Last Name </label>
          <input type="text" name="last_name" class="form-control" id="yourName" required value="{{ old('last_name')}}">
          <div class="invalid-feedback">Please, enter your last name!</div>
        </div>

        <div class="col-12">
          <label for="yourUsername" class="form-label">Username</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="text" name="username" class="form-control" id="yourUsername" required value="{{ old('username')}}">
            <div class="invalid-feedback">Please choose a username.</div>
          </div>
        </div>

        <div class="col-12">
          <label for="yourEmail" class="form-label">Your Email</label>
          <input type="email" name="email" class="form-control" id="yourEmail" required>
          <span style="color: red;">{{ $errors->first('email')}}</span>
          <div class="invalid-feedback">Please enter a valid Email adddress!</div>
        </div>

      
        <div class="col-12">
            <label for="yourPassword" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" class="form-control" id="yourPassword" required>
                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                    <i class="bi bi-eye"></i> <!-- Optional: Bootstrap Icon -->
                </button>
            </div>
            <div class="invalid-feedback">Please enter your password!</div>
        </div>

        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
            <div class="invalid-feedback">You must agree before submitting.</div>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Create Account</button>
        </div>
        <div class="col-12">
          <p class="small mb-0">Already have an account? <a href="{{url('')}}">Log in</a></p>
        </div>
      </form>

    </div>
  </div>


  <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('yourPassword');
        const passwordFieldType = passwordField.getAttribute('type');

        // Toggle the password field type between password and text
        if (passwordFieldType === 'password') {
            passwordField.setAttribute('type', 'text');
            this.innerHTML = '<i class="bi bi-eye-slash"></i>'; // Change icon
        } else {
            passwordField.setAttribute('type', 'password');
            this.innerHTML = '<i class="bi bi-eye"></i>'; // Change icon
        }
    });
</script>


@endsection