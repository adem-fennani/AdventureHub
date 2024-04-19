

const content = document.getElementById('content');
const image = document.getElementById('image');
const loc = document.getElementById('location');

const form = document.getElementById('frm');
const errorElement = document.getElementById('errorinput');

form.addEventListener('submit', (e) => {
  let messages = [];

  if (content.value.trim() === '') {
    messages.push('Content cannot be empty.');
  }

  if (image.value.trim() !== '' && !/\.(jpg|jpeg|png|gif)$/.test(image.value)) {
    messages.push('Invalid image URL. Supported formats: jpg, jpeg, png, gif.');
  }

  if (loc.value.trim() === '') {
    messages.push('Location is required.');
  }

  if (messages.length > 0) {
    e.preventDefault();
    errorElement.innerText = messages.join(', ');
    errorElement.classList.add('error'); 
  } else {
    console.log('Form submitted successfully!'); 
  }
});