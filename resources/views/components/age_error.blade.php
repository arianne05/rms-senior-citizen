@if(session()->has('error'))
{{-- ALERT SWAL --}}
{{-- <script>
    const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: "success",
    title: "{{session('error')}}"
    });
</script> --}}
<script>
    Swal.fire({
    title: "Cannot Add User",
    text: "{{session('error')}}",
    icon: "error"
    });
</script>
@endif