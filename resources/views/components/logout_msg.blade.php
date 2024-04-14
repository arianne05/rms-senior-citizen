<script>
    document.getElementById('logoutbtn').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: "Do you want to Logout?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, exit the system!",
            cancelButtonText: "No, cancel",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger the form submission
                document.getElementById('logoutform').submit();
            } else {
                // If the user clicks 'No' or closes the dialog, do nothing
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Logout Cancelled.",
                    icon: "error"
                });
            }
        });
    });
</script>