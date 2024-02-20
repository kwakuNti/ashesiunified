function toggleDetails() {
    var studentDetails = document.getElementById("studentDetails");
    var staffDetails = document.getElementById("staffDetails");

    if (document.getElementById("student_role").checked) {
        studentDetails.style.display = "block";
        staffDetails.style.display = "none";
    } else if (document.getElementById("staff_role").checked) {
        studentDetails.style.display = "none";
        staffDetails.style.display = "block";
    }
}
    
    
    
    document.getElementById("registerForm").addEventListener("submit", function(event) {
        var firstNameInput = document.getElementById("first_name");
        var lastNameInput = document.getElementById("surname");
        var emailInput = document.getElementById("email");
        var passwordInput = document.getElementById("password");
        var confirmPasswordInput = document.getElementById("confirm_password");
        var feedbackDiv = document.querySelector(".feedback");

        var emailPattern = /[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;
        var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/;

        if (!emailPattern.test(emailInput.value)) {
            feedbackDiv.textContent = "Please enter a valid Ashesi University email address";
            event.preventDefault();
            return;
        }

        if (!passwordPattern.test(passwordInput.value)) {
            feedbackDiv.textContent = "Password must contain at least one upper, lower, digit, special character and at least 8 characters long.";
            event.preventDefault();
            return;
        }

        if (passwordInput.value !== confirmPasswordInput.value) {
            feedbackDiv.textContent = "Passwords do not match";
            event.preventDefault();
            return;
        }

        feedbackDiv.textContent = "";
    });
