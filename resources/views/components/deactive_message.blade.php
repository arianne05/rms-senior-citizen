<script>
    document.getElementById('deactiveBTN').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default link behavior

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: "Deactivate this account status?",
            text: "This account will change its status to Deactivated",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, change it!",
            cancelButtonText: "No, cancel",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the specified URL
                window.location.href = document.getElementById('deactiveBTN').getAttribute('href');
            } else {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Account status remain Active",
                    icon: "error"
                });
            }
        });
    });
</script>
