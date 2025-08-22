// Get the current year
const currentYear = new Date().getFullYear();

// Display the current year in the copyright notice
document.getElementById("copyright-year").textContent = currentYear;

// Demo form handling
document.getElementById("demo-form").addEventListener("submit", function (e) {
  e.preventDefault();

  const submitBtn = document.getElementById("demo-submit-btn");
  const btnText = submitBtn.querySelector(".btn-text");
  const btnSpinner = submitBtn.querySelector(".btn-spinner");
  const messagesDiv = document.getElementById("demo-form-messages");

  // Clear previous messages
  messagesDiv.innerHTML = "";

  // Show loading state
  btnText.classList.add("d-none");
  btnSpinner.classList.remove("d-none");
  submitBtn.disabled = true;

  // Get form data
  const formData = new FormData(this);

  // Validate date is not in the past
  const selectedDate = new Date(formData.get("preferred_date"));
  const today = new Date();
  today.setHours(0, 0, 0, 0);

  if (selectedDate < today) {
    showMessage("Please select a future date for your demo.", "error");
    resetButton();
    return;
  }

  // Send form data
  fetch("backend/demo-handler.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        showMessage(data.message, "success");
        // Reset form after successful submission
        document.getElementById("demo-form").reset();
        // Close modal after 3 seconds
        setTimeout(() => {
          $("#demo-modal").modal("hide");
        }, 3000);
      } else {
        showMessage(data.message, "error");
      }
    })
    .catch((error) => {
      console.error("Error:", error);
      showMessage(
        "An error occurred while booking your demo. Please try again.",
        "error"
      );
    })
    .finally(() => {
      resetButton();
    });

  function showMessage(message, type) {
    const alertClass = type === "success" ? "alert-success" : "alert-danger";
    const iconClass =
      type === "success"
        ? "fas fa-check-circle"
        : "fas fa-exclamation-triangle";

    messagesDiv.innerHTML = `
          <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
            <i class="${iconClass} mr-2"></i>${message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        `;
  }

  function resetButton() {
    btnText.classList.remove("d-none");
    btnSpinner.classList.add("d-none");
    submitBtn.disabled = false;
  }
});

// Set minimum date to today for the date picker
document.addEventListener("DOMContentLoaded", function () {
  const dateInput = document.getElementById("demo-date");
  const today = new Date();
  const tomorrow = new Date(today);
  tomorrow.setDate(tomorrow.getDate() + 1);

  // Set minimum date to tomorrow
  dateInput.min = tomorrow.toISOString().split("T")[0];
});

document.addEventListener("DOMContentLoaded", function () {
  const contactForm = document.querySelector("form");
  const submitButton = contactForm.querySelector('button[type="submit"]');
  const originalButtonText = submitButton.innerHTML;

  contactForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Get form data
    const firstName = document.getElementById("firstNameLabel").value.trim();
    const lastName = document.getElementById("lastNameLabel").value.trim();
    const email = document.getElementById("EmailLabel").value.trim();
    const phone = document.getElementById("phonenumberLabel").value.trim();
    const message = document.getElementById("message-2").value.trim();

    // Basic validation
    if (!firstName || !lastName || !email || !phone || !message) {
      showAlert("Please fill in all required fields.", "error");
      return;
    }

    // Email validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      showAlert("Please enter a valid email address.", "error");
      return;
    }

    // Show loading state
    submitButton.disabled = true;
    submitButton.innerHTML =
      '<i class="fas fa-spinner fa-spin mr-2"></i>Sending...';

    // Execute reCAPTCHA v3
    grecaptcha.ready(function () {
      grecaptcha
        .execute("6Le8Aa0rAAAAAIRKHEfNSkoQN4cTHKy8SFRwcHvD", {
          action: "contact_form",
        })
        .then(function (token) {
          // Prepare form data
          const formData = new FormData();
          formData.append("firstName", firstName);
          formData.append("lastName", lastName);
          formData.append("email", email);
          formData.append("phone", phone);
          formData.append("message", message);
          formData.append("recaptcha_token", token);
          formData.append("recaptcha_action", "contact_form");

          // Send to backend
          fetch("backend/contact-handler.php", {
            method: "POST",
            body: formData,
          })
            .then((response) => response.json())
            .then((data) => {
              // Reset button
              submitButton.disabled = false;
              submitButton.innerHTML = originalButtonText;

              if (data.success) {
                showAlert(
                  "Thank you for your message! We'll get back to you soon.",
                  "success"
                );
                contactForm.reset();
              } else {
                showAlert(
                  data.message ||
                    "There was an error sending your message. Please try again.",
                  "error"
                );
              }
            })
            .catch((error) => {
              console.error("Contact form error:", error);

              // Reset button
              submitButton.disabled = false;
              submitButton.innerHTML = originalButtonText;

              showAlert(
                "There was an error sending your message. Please try again.",
                "error"
              );
            });
        });
    });
  });

  function showAlert(message, type) {
    // Remove any existing alerts
    const existingAlert = document.querySelector(".contact-alert");
    if (existingAlert) {
      existingAlert.remove();
    }

    // Create new alert
    const alertDiv = document.createElement("div");
    alertDiv.className = `alert alert-${
      type === "success" ? "success" : "danger"
    } contact-alert`;
    alertDiv.style.cssText =
      "position: fixed; top: 20px; right: 20px; z-index: 9999; min-width: 300px;";
    alertDiv.innerHTML = `
          <div class="d-flex align-items-center">
            <i class="fas fa-${
              type === "success" ? "check-circle" : "exclamation-circle"
            } mr-2"></i>
            <span>${message}</span>
            <button type="button" class="close ml-auto" onclick="this.parentElement.parentElement.remove()">
              <span>&times;</span>
            </button>
          </div>
        `;

    document.body.appendChild(alertDiv);

    // Auto remove after 5 seconds
    setTimeout(() => {
      if (alertDiv.parentElement) {
        alertDiv.remove();
      }
    }, 5000);
  }
});
