$(function () {
    $("#contactForm").submit(function (event) {
        event.preventDefault();

        var $form = $(this);

        $.ajax({
            url: "contact.php",
            type: "POST",
            data: $form.serialize(), // Serialize form data
            success: function (response) {
                if (response === "success") {
                    $('#success').html('<div class="alert alert-success">Your message has been sent.</div>');
                    $form.trigger("reset");
                } else {
                    $('#success').html('<div class="alert alert-danger">Sorry, there was an error. Please try again later.</div>');
                }
            },
            error: function () {
                $('#success').html('<div class="alert alert-danger">Sorry, there was an error. Please try again later.</div>');
            }
        });
    });

    $('#name').focus(function () {
        $('#success').html('');
    });
});
