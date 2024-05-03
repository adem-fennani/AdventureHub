function decrementQuantity(buttonElement) {
  // Get the parent element containing the quantity display
  const quantityContainer = buttonElement.parentElement.parentElement;

  // Find the element displaying the quantity
  const quantitySpan = quantityContainer.querySelector("span");

  // Get the current quantity value (convert to number)
  let currentQuantity = parseInt(quantitySpan.textContent);

  // Decrement the quantity but ensure it doesn't go below 1
  currentQuantity = Math.max(currentQuantity - 1, 1);

  // Update the displayed quantity
  quantitySpan.textContent = currentQuantity;

  // Update the hidden input field for quantity
  updateQuantityInput(buttonElement, currentQuantity);
}

function incrementQuantity(buttonElement) {
  // Get the parent element containing the quantity display
  const quantityContainer = buttonElement.parentElement.parentElement;

  // Find the element displaying the quantity
  const quantitySpan = quantityContainer.querySelector("span");

  // Get the current quantity value (convert to number)
  let currentQuantity = parseInt(quantitySpan.textContent);

  // Increment the quantity
  currentQuantity++;

  // Update the displayed quantity
  quantitySpan.textContent = currentQuantity;

  // Update the hidden input field for quantity
  updateQuantityInput(buttonElement, currentQuantity);
}

function updateQuantityInput(buttonElement, newQuantity) {
  // Get the parent form element
  const formElement = buttonElement.closest("form");

  // Check if the form element exists
  if (formElement) {
    // Find the hidden input field for quantity
    const quantityInput = formElement.querySelector("[name='quantity']");

    // Update the value of the quantity input field
    if (quantityInput) {
      quantityInput.value = newQuantity;
    } else {
      console.error("Quantity input field not found in the form.");
    }
  } else {
    console.error("Parent form element not found.");
  }
}
