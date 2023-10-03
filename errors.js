var nameError = document.getElementById("name-error");
var emailError = document.getElementById("email-error");
var phoneError = document.getElementById("phone-error");
var addressError = document.getElementById("address-error");
var submitError = document.getElementById("submit-error");
var passwordError = document.getElementById("password-error");
var confirmError = document.getElementById("confirm-error");

function validateName() {
  var name = document.getElementById("contact-name").value;

  if (name.length == 0) {
    nameError.innerHTML = "Username is required";
    return false;
  }
  if (!name.match(/^[a-zA-Z]/)) {
    nameError.innerHTML = "Username  must start with an alphabet";
    return false;
  }
  if (!name.match(/^.{5,}$/)) {
    nameError.innerHTML = "Minimum 5 characters";
    return false;
  }
  if (name.match(/\s/)) {
    nameError.innerHTML = "No Spaces Allowed";
    return false;
  }
  if (!name.match(/^[a-zA-Z0-9]+$/)) {
    nameError.innerHTML = "No Special Characters";
    return false;
  }
  nameError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
  return true;
}

function validatePhone() {
  var phone = document.getElementById("contact-phone").value;

  if (phone.length == 0) {
    phoneError.innerHTML = "Phone number required";
    return false;
  }
  if (phone.length !== 10) {
    phoneError.innerHTML = "Should be 10 digits";
    return false;
  }
  if (!phone.match(/^[0-9]{10}$/)) {
    phoneError.innerHTML = "Only Numbers";
    return false;
  }
  phoneError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
  return true;
}

function validateEmail() {
  var email = document.getElementById("contact-email").value;

  if (email.length == 0) {
    emailError.innerHTML = "Email required";
    return false;
  }

  if (!email.match(/^[a-zA-Z]/)) {
    emailError.innerHTML = "Email must start with an alphabet";
    return false;
  }

  if (!email.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/)) {
    emailError.innerHTML = "Invalid email";
    return false;
  }
  emailError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
  return true;
}
function validateAddress() {
  var address = document.getElementById("contact-address").value;

  if (address == 0) {
    addressError.innerHTML = "Address Required";
    return false;
  }
  if (!address.match(/^[\w\s.,-]+$/)) {
    addressError.innerHTML = "Write Proper Address";
    return false;
  }
  addressError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
  return true;
}

function validatePassword() {
  var password = document.getElementById("contact-password").value;
  if (password == 0) {
    passwordError.innerHTML = "password empty";
    return false;
  }
  if (
    !password.match(
      /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/
    )
  ) {
    passwordError.innerHTML = "Invalid Password";
    return false;
  }
  passwordError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
  return true;
}

function validateCPassword() {
  var password = document.getElementById("contact-password").value;
  var cpassword = document.getElementById("contact-cpassword").value;

  if (cpassword.length === 0) {
    confirmError.innerHTML = "Confirm password empty";
    return false;
  }

  if (password !== cpassword) {
    confirmError.innerHTML = "Passwords do not match";
    return false;
  }

  confirmError.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
  return true;
}

function validateForm(event) {
  var submitError = document.getElementById("submit-error");
  var successMessage = document.getElementById("success-message");

  if (
    !validateName() ||
    !validatePhone() ||
    !validateEmail() ||
    !validateAddress() ||
    !validatePassword() ||
    !validateCPassword()
  ) {
    submitError.style.display = "block";
    submitError.innerHTML = "Please fix the errors.";
    setTimeout(function () {
      submitError.style.display = "none";
    }, 3000);
    event.preventDefault(); // Prevent immediate form submission
    return false;
  }

  // All validations passed, show success message
  successMessage.style.display = "block";
  successMessage.innerHTML = "Registration successful!";
  successMessage.style.color = "green";

  setTimeout(function () {
    event.target.submit(); // Submit the form after 3 seconds
  }, 3000);
}
