document.getElementById("registerForm").addEventListener("submit", function(event) {
    var firstNameInput = document.getElementById("first_name");
    var lastNameInput = document.getElementById("last_name");
    var phoneNumberInput = document.getElementById("phone_number");
    var dobInput = document.getElementById("dob");
    var genderInput = document.getElementById("gender");
    var studentIdInput = document.getElementById("student_id");
    var emailInput = document.getElementById("email");
    var passwordInput = document.getElementById("password");
    var confirmPasswordInput = document.getElementById("confirm_password");
    var feedbackDiv = document.querySelector(".feedback");

    // Check if any field is empty
    if (isEmpty(firstNameInput, lastNameInput, phoneNumberInput, dobInput, genderInput, studentIdInput, emailInput, passwordInput, confirmPasswordInput)) {
    feedbackDiv.textContent = "All fields are required.";
    event.preventDefault();
    return;
    }

    // Validate student ID (assuming 8 digits)
    if (!validateStudentId(studentIdInput.value)) {
      feedbackDiv.textContent = "Please enter a valid 8-digit student ID.";
      event.preventDefault();
      return;
    }


    // Validate email (assuming Ashesi University format)
    if (!validateEmail(emailInput.value)) {
    feedbackDiv.textContent = "Please enter a valid Ashesi University email address.";
    event.preventDefault();
    return;
    }

    // Validate password using a strong password regular expression
    if (!validatePassword(passwordInput.value)) {
    feedbackDiv.textContent = "Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be at least 8 characters long.";
    event.preventDefault();
    return;
    }

    // Check if password and confirm password match
    if (passwordInput.value !== confirmPasswordInput.value) {
      feedbackDiv.textContent = "Passwords do not match.";
      event.preventDefault();
      return;
    }
  
    // All validations passed, proceed with form submission or send data to server for further validation (highly recommended)
    feedbackDiv.textContent = "";
    // Consider using AJAX or a similar method to send data to the server for secure validation and processing
  });
  
  // Helper functions for validation:
  function isEmpty(...fields) {
    return fields.some(field => field.value.trim() === "");
  }
  
  function validateStudentId(studentId) {
    const studentIdPattern = /^\d{8}$/;
    return studentIdPattern.test(studentId);
  }
  
  function validateEmail(email) {
    const emailPattern = /^[^\s@]+@ashesi\.edu\.gh$/;
    return emailPattern.test(email);
  }
  
  function validatePassword(password) {
    const strongPasswordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[~!@#$%^&*()_+-=|:<>?.{}[\];'"\\/])[^\s]{8,}$/;
    return strongPasswordRegex.test(password);
  }
  