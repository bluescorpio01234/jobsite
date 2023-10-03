var nameError = document.getElementById("name-error");
var emailError = document.getElementById("email-error");
var phoneError = document.getElementById("phone-error");
var addressError = document.getElementById("address-error");

var confirmError = document.getElementById("confirm-error");

function validateName() {
  var name = document.getElementById("contact-name").value;

  if (name.length == 0) {
    nameError.innerHTML = "Name is required";
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

function validateForm(event) {
  var confirmError = document.getElementById("confirm-error");
  var successMessage = document.getElementById("success-message");

  if (
    !validateName() ||
    !validatePhone() ||
    !validateEmail() ||
    !validateAddress() ||
    !validatePassword() ||
    !validateCPassword()
  ) {
    confirm.style.display = "block";
    confirm.innerHTML = "Please fix the errors.";
    setTimeout(function () {
      confirm.style.display = "none";
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
