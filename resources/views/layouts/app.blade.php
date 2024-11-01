@php 

$GetLogoImage = App\Models\Logo::find(1);

 @endphp



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> {{!empty($meta_title) ? $meta_title : '' }} | Sacco Management System </title>
  <meta content="" name="description">
  <meta content="" name="keywords">   

  <!-- Favicons -->
  <link href="{{ $GetLogoImage->getLogo() }}" rel="icon">
 

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css' )}}" rel="stylesheet">
  <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css' )}}" rel="stylesheet">
  <link href="{{url('assets/vendor/boxicons/css/boxicons.min.css' )}}" rel="stylesheet">
  <link href="{{url('assets/vendor/quill/quill.snow.css' )}}" rel="stylesheet">
  <link href="{{url('assets/vendor/quill/quill.bubble.css' )}}" rel="stylesheet">
  <link href="{{url('assets/vendor/remixicon/remixicon.css' )}}" rel="stylesheet">
  <link href="{{url('assets/vendor/simple-datatables/style.css' )}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('assets/css/style.css' )}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  
  <main>
    
    <div class="container">
      
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
               <!-- Toast Message (Inserted here) -->
               @if(session('success') || session('error') || $errors->any())
               <div id="toastContainer" class="position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 11;"></div>
               @endif

              <div class="d-flex justify-content-center py-4">
                <a href="" class="logo d-flex align-items-center w-auto">
                  <img src="{{$GetLogoImage->getLogo()}}" alt="">
                  <span class="d-none d-lg-block">{{ $GetLogoImage->name  }}</span>
                </a>
              </div>
              <!-- End Logo -->


             
             @yield('content')


              <div class="credits">
            
                Designed by <a href="https://ogiki477.me/" target="blank">Ogiki Moses Odera</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('assets/vendor/apexcharts/apexcharts.min.js' )}}"></script>
  <script src="{{url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js' )}}"></script>
  <script src="{{url('assets/vendor/chart.js/chart.umd.js' )}}"></script>
  <script src="{{url('assets/vendor/echarts/echarts.min.js' )}}"></script>
  <script src="{{url('assets/vendor/quill/quill.js' )}}"></script>
  <script src="{{url('assets/vendor/simple-datatables/simple-datatables.js' )}}"></script>
  <script src="{{url('assets/vendor/tinymce/tinymce.min.js' )}}"></script>
  <script src="{{url('assets/vendor/php-email-form/validate.js' )}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('assets/js/main.js' )}}"></script>


   <!-- Toast JavaScript -->
   <script>
    window.addEventListener('load', function() {
        @if(session('success'))
        showToast("{{ session('success') }}", 'bg-success');
        @elseif(session('error'))
        showToast("{{ session('error') }}", 'bg-danger');
        @endif

        @if($errors->any())
        let errorMessages = '';
        @foreach ($errors->all() as $error)
          errorMessages += `{{ $error }}<br>`;
        @endforeach
        showToast(errorMessages, 'bg-danger');
        @endif
    });

    function showToast(message, type) {
    const toastContainer = document.getElementById('toastContainer');

    // Create the toast structure
    const toastElement = document.createElement('div');
    toastElement.className = `toast align-items-center text-white ${type} border-0`;
    toastElement.setAttribute('role', 'alert');
    toastElement.setAttribute('aria-live', 'assertive');
    toastElement.setAttribute('aria-atomic', 'true');

    const toastBody = `
        <div class="d-flex">
            <div class="toast-body">${message}</div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    `;

    toastElement.innerHTML = toastBody;
    toastContainer.appendChild(toastElement);

    // Initialize and show the toast with custom delay (e.g., 3000ms = 3 seconds)
    const toast = new bootstrap.Toast(toastElement, { delay: 2000 });
    toast.show();

    // Optionally remove the toast from DOM after it's hidden
    toastElement.addEventListener('hidden.bs.toast', function () {
        toastElement.remove();
    });
}

  </script>

</body>


</html>