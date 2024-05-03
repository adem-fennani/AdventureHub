function validateComplaintForm() {
  const complaintIdInput = document.getElementById('complaintId');
  const firstNameInput = document.getElementById('firstName');
  const lastNameInput = document.getElementById('lastName');
  const complaintContentInput = document.getElementById('complaintContent');
  const complaintDateInput = document.getElementById('complaintDate');

  clearErrors();

  if (!complaintIdInput.value.trim()) {
    showError(complaintIdInput, 'Please enter a complaint ID');
    complaintIdInput.focus();
    return false;
  }
  const complaintId = parseInt(complaintIdInput.value);
  if (isNaN(complaintId) || complaintId <= 0) {
    showError(complaintIdInput, 'Complaint ID must be a positive number');
    complaintIdInput.focus();
    return false;
  }

  if (!firstNameInput.value.trim()) {
    showError(firstNameInput, 'Please enter your first name');
    firstNameInput.focus();
    return false;
  }

  if (!lastNameInput.value.trim()) {
    showError(lastNameInput, 'Please enter your last name');
    lastNameInput.focus();
    return false;
  }

  if (!complaintContentInput.value.trim()) {
    showError(complaintContentInput, 'Please enter your complaint content');
    complaintContentInput.focus();
    return false;
  }

  // Validate Complaint Date (presence)
  if (!complaintDateInput.value) {
    showError(complaintDateInput, 'Please enter the complaint date');
    complaintDateInput.focus();
    return false;
  }

  return true;
}

const complaintForm = document.getElementById('complaintForm'); // Assuming your form has the ID "complaintForm"
complaintForm.addEventListener('submit', function(event) {
  if (!validateComplaintForm()) {
    event.preventDefault(); // Prevent default form submission if validation fails
  }
});

function showError(input, errorMessage) {
  console.error(errorMessage); // Example: Log the error message to the console
}

function clearErrors() {
  // Implement your logic to clear any previously displayed error messages
}
