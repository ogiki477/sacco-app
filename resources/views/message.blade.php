@if(count($errors) > 0)
    @foreach($errors->all() as $error)

       <div class="alert alert-danger">
        {{$error}}
       </div>


    @endforeach
@endif

@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif

@if(session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif


<!-- Include Bootstrap JS and Popper (if not already included) -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    window.addEventListener('load', function() {
        let successMessage = document.querySelector('.alert-success');
        let errorMessage = document.querySelector('.alert-danger');

        if (successMessage) {
            showToast(successMessage.textContent.trim(), 'bg-success');
        }

        if (errorMessage) {
            showToast(errorMessage.textContent.trim(), 'bg-danger');
        }
    });

    function showToast(message, type) {
        // Create toast container at the top if it doesn't exist
        if (!document.getElementById('toastContainer')) {
            const toastContainer = document.createElement('div');
            toastContainer.id = 'toastContainer';
            toastContainer.className = 'position-fixed top-0 start-50 translate-middle-x p-3';
            toastContainer.style.zIndex = '11';
            document.body.appendChild(toastContainer);
        }

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
        document.getElementById('toastContainer').appendChild(toastElement);

        // Initialize and show the toast
        const toast = new bootstrap.Toast(toastElement);
        toast.show();

        // Optionally remove the toast from DOM after it's hidden
        toastElement.addEventListener('hidden.bs.toast', function () {
            toastElement.remove();
        });
    }
</script>

<!-- Optionally, add some custom CSS to style the toast (if needed) -->
<style>
    .toast {
        margin-top: 1rem;
    }
</style> --}}
