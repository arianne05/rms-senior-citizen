<script>
    document.getElementById('delete_confirmation').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default link behavior

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "#28a745",
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
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the specified URL
                window.location.href = document.getElementById('delete_confirmation').getAttribute('href');
            } else {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "The account is safe",
                    icon: "error",
                    confirmButtonColor: "#3085d6"
                });
            }
        });

        // Apply custom button styles
        const confirmButton = document.querySelector('.swal2-confirm');
        const cancelButton = document.querySelector('.swal2-cancel');

        if (confirmButton) {
            confirmButton.style.backgroundColor = '#28a745'; // Custom green color
            confirmButton.style.borderColor = '#28a745';
            confirmButton.style.color = '#fff';
        }

        if (cancelButton) {
            cancelButton.style.backgroundColor = '#dc3545'; // Custom red color
            cancelButton.style.borderColor = '#dc3545';
            cancelButton.style.color = '#fff';
        }
    });
</script>
