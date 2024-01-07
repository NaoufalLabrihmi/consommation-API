$(document).ready(function() {
    // Handle form submission
    $("#registrationForm").submit(function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Serialize the form data
        var formData = $(this).serialize();

        // Perform AJAX request
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            success: function(response) {
                window.location.href = "http://localhost/MokhlisBelhaj_Alpha/authentication/login";

                // Handle the success response

            },
            error: function(error) {
                // Handle the error response
                data = error.responseJSON;


                $("#name_err").text(data.name_err);
                if (data.name_err !== "") {
                    $("#name").addClass('border-red-500');
                } else {
                    $("#name").removeClass('border-red-500');
                }

                $("#email_err").text(data.email_err);
                if (data.email_err) {
                    $("#email").addClass('border-red-500');
                } else {
                    $("#email").removeClass('border-red-500');
                }

                $("#password_err").text(data.password_err);
                if (data.password_err !== "") {
                    $("#password").addClass('border-red-500');
                } else {
                    $("#password").removeClass('border-red-500');
                }

                $("#confirm_password_err").text(data.confirm_password_err);
                if (data.confirm_password_err !== "") {
                    $("#confirm_password").addClass('border-red-500');
                } else {
                    $("#confirm_password").removeClass('border-red-500');

                }

            }
        });
    });
});