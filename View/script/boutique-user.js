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
}
