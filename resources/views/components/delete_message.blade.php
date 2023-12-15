<script>
    document.getElementById('delete_confirmation').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default link behavior

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: "Delete this account?",
            text: "You won't be able to revert this",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the specified URL
                window.location.href = document.getElementById('delete_confirmation').getAttribute('href');
            } else {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "The account is safe",
                    icon: "error"
                });
            }
        });
    });
</script>
