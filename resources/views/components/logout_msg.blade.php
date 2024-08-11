<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    document.getElementById('logoutbtn').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "#3085d6",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true // Disable default button styling
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
