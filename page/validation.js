function validatePassword() {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm_password").value;

    if (password.length < 8) {
        alert("Password must be at least 8 characters long.");
        return false;
    }

    var specialCharacters = /[!@#$%^&*()\-_=+{}[\]|\\;:'"<>,./?]/g;
    if (!password.match(specialCharacters)) {
        alert("Password must contain at least one special character (!@#$%^&*()-_=+{}[]|\\;:'\"<>,./?)");
        return false;
    }

    var upperCaseLetters = /[A-Z]/g;
    if (!password.match(upperCaseLetters)) {
        alert("Password must contain at least one uppercase letter.");
        return false;
    }

    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    return true;
}
