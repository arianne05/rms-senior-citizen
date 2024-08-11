<script>
    document.getElementById('activeBTN').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default link behavior

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: "Activate this account status?",
            text: "This account will change its status to Active",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, change it!",
            cancelButtonText: "No, cancel",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the specified URL
                window.location.href = document.getElementById('activeBTN').getAttribute('href');
            } else {
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Account status remain Deactivated",
                    icon: "error"
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
