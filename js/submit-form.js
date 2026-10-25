function initSubmitContact() {
    var $form = $("#contactForm");
    if (!$form.length) return;
    var $name = $("#name");
    var $email = $("#email");
    var $phone = $("#phone");
    var $subject = $("#subject");
    var $message = $("#message");
    var $successMessage = $("#success-message");
    var $errorMessage = $("#error-message");

    // Helper to show error
    function showError($input, message) {
        $input.addClass("error-border");
        var $errorText = $input.siblings(".error-text");
        if ($errorText.length === 0) {
            $errorText = $('<div class="error-text"></div>');
            $input.after($errorText);
        }
        $errorText.text(message).removeClass("hidden");
    }

    // Helper to clear error
    function clearError($input) {
        $input.removeClass("error-border");
        var $errorText = $input.siblings(".error-text");
        $errorText.addClass("hidden");
    }

    function validateEmail(email) {
        var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return pattern.test(email);
    }

    $form.off("submit").on("submit", function (event) {
        event.preventDefault();

        var isValid = true;

        // Validate Name
        if ($.trim($name.val()) === "") {
            showError($name, "Name is required");
            isValid = false;
        } else {
            clearError($name);
        }

        // Validate Email
        if ($.trim($email.val()) === "") {
            showError($email, "Email is required");
            isValid = false;
        } else if (!validateEmail($email.val())) {
            showError($email, "Invalid email format");
            isValid = false;
        } else {
            clearError($email);
        }

        // Validate Phone
        if ($.trim($phone.val()) === "") {
            showError($phone, "Phone is required");
            isValid = false;
        } else {
            clearError($phone);
        }

        // Validate Subject
        if ($.trim($subject.val()) === "") {
            showError($subject, "Subject is required");
            isValid = false;
        } else {
            clearError($subject);
        }

        // Validate Message
        if ($.trim($message.val()) === "") {
            showError($message, "Message is required");
            isValid = false;
        } else {
            clearError($message);
        }

        if (!isValid) {
            $errorMessage.removeClass("hidden");
            $successMessage.addClass("hidden");
            setTimeout(function () {
                $errorMessage.addClass("hidden");
            }, 3000);
            return;
        } else {
            $errorMessage.addClass("hidden");
        }

        // Show loading overlay
        var $loadingOverlay = $("#contactFormLoading");
        $loadingOverlay.removeClass("hidden");
        $form.find("button[type=submit]").prop("disabled", true);

        // Submit form via AJAX
        $.ajax({
            url: $form.attr('action'),
            type: 'POST',
            data: $form.serialize(),
            dataType: 'json',
            success: function(response) {
                $loadingOverlay.addClass("hidden");
                $form.find("button[type=submit]").prop("disabled", false);
                if (response.success) {
                    window.location.href = "contact_success.php";
                } else {
                    $errorMessage.find("p").text(response.message || "Form submission failed. Please try again.");
                    $errorMessage.removeClass("hidden");
                    setTimeout(function () {
                        $errorMessage.addClass("hidden");
                    }, 5000);
                }
            },
            error: function() {
                $loadingOverlay.addClass("hidden");
                $form.find("button[type=submit]").prop("disabled", false);
                $errorMessage.find("p").text("An error occurred. Please try again later.");
                $errorMessage.removeClass("hidden");
                setTimeout(function () {
                    $errorMessage.addClass("hidden");
                }, 5000);
            }
        });
    });
}

$(function () {
    if ($("#contactForm").length) {
        initSubmitContact();
    }
});

function initSubmitNewsletter() {
    $('#newsletterForm').on('submit', function(event) {
        event.preventDefault();

        var $email = $('#newsletter-email');
        var $successMessage = $('#newsletter-success');
        var $errorText = $email.next('.error-text');

        var isValid = true;

        function validateEmail(email) {
            var pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            return pattern.test(email);
        }

        if (!$email.val().trim()) {
            $email.addClass('error-border');
            $errorText.text('Email is required').removeClass('hidden');
            isValid = false;
        } else if (!validateEmail($email.val().trim())) {
            $email.addClass('error-border');
            $errorText.text('Invalid email format').removeClass('hidden');
            isValid = false;
        } else {
            $email.removeClass('error-border');
            $errorText.addClass('hidden');
        }

        if (isValid) {
            $successMessage.removeClass('hidden');
            $('#newsletterForm')[0].reset();
            setTimeout(function() {
                $successMessage.addClass('hidden');
            }, 3000);
        }
    });
}