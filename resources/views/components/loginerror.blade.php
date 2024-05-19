@php
    if ($errors->has('loginerror')) {
@endphp
    <script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ $errors->first('loginerror') }}"
        });
    </script>
@php
    }
@endphp
