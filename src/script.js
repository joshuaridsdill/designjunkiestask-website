$(document).ready(function () {
    $("#contactForm").submit(function (event) {
        event.preventDefault();

        var response = grecaptcha.getResponse();
        if (response.length === 0) {
            showAlert("Please complete the reCAPTCHA", 3000);
            return false;
        } else {
            $.ajax({
                url: "php/submit_form.php",
                type: "post",
                data: $(this).serialize(),
                success: function (response) {
                    showAlert("Form submitted successfully!", 3000);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                    showAlert("An error occurred while submitting the form. Please try again.", 3000);
                }
            });
        }
    });
});

function showAlert(message, duration) {
    var alertElement = document.createElement("div");
    alertElement.classList.add("customAlert");
    alertElement.textContent = message;

    var deleteButton = document.createElement("button");
    deleteButton.textContent = "X";
    deleteButton.classList.add("delete-button");

    deleteButton.addEventListener("click", function() {
        hideAlert(alertElement);
    });

    alertElement.appendChild(deleteButton);

    document.body.appendChild(alertElement);

    setTimeout(function() {
        hideAlert(alertElement);
    }, duration);
}

function hideAlert(alertElement) {
    alertElement.parentNode.removeChild(alertElement);
}