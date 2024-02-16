
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        var emailInput = document.getElementById("email");
        var passwordInput = document.getElementById("password");
        var feedbackDiv = document.querySelector(".feedback");
        var emailPattern = /[a-zA-Z0-9._%+-]+@ashesi\.edu\.gh$/;
        var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/;

        if (!emailPattern.test(emailInput.value)) {
            feedbackDiv.textContent = "Please enter a valid Ashesi University email address";
            event.preventDefault();
            return;
        }

        if (!passwordPattern.test(passwordInput.value)) {
            feedbackDiv.textContent = "Password must contain at least one upper,lower,special and be at least 8 characters long.";
            event.preventDefault();
            return;
        }

        feedbackDiv.textContent = "";
    });

