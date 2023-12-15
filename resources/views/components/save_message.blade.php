<script>
    document.getElementById('saveChangesBtn').addEventListener('click', function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: true
        });

        swalWithBootstrapButtons.fire({
            title: "Edit this account?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, save changes!",
            cancelButtonText: "No, cancel",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger the form submission
                document.getElementById('myForm').submit();
            } else {
                // If the user clicks 'No' or closes the dialog, do nothing
                swalWithBootstrapButtons.fire({
                    title: "Cancelled",
                    text: "Your changes are not saved.",
                    icon: "error"
                });
            }
        });
    });
</script>