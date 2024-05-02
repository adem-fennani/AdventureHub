

const form = document.getElementById("frm");
const user_id = document.getElementById("user_id");
const content = document.getElementById("content");
const image = document.getElementById("image");
const loc = document.getElementById("location");
console.log("found everything");



form.addEventListener("submit", function (event) {
  console.log("enter form input control");
  event.preventDefault();
  checkUser_id();
 checkContent();
  checkImage();
  checkLocation();
  //checkPassword()
  console.log ( "the actual value is ");

  console.log ( document.getElementById("error1").innerHTML);

  if (
    document.getElementById("error1").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error2").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error3").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error4").innerHTML === "<span style=\"color:green\"> Correct </span>"
  ) {
    // Submit the form if all inputs are correct
    form.submit();
  }
}




);



function checkUser_id() {
  console.log("enter user id");
  const uid = user_id.value;
  const possible_id = /^[0-9]*[0-9][0-9]*$/;
  const error1 = document.getElementById("error1");

  if (!uid.match(possible_id)) {
    error1.innerHTML =
      "enter valid user id :  only numbers";
  } else {
    error1.innerHTML = "<span style='color:green'> Correct </span>";
  }
}


function checkContent() {
  console.log("enter content_input ");

  const content_input = content.value;
  const possible_content = /^[A-Za-z0-9\s.,!?'"()]+$/;
  const error2 = document.getElementById("error2");

  if (!content_input.match(possible_content)) {
    error2.innerHTML = "enter a content";
  } else {
    error2.innerHTML = "<span style='color:green'> Correct </span>";
  }
}



function checkImage() {
  console.log("enter image_input ");
  const image_input = image.value;
  const possible_image_name = /^[A-Za-z0-9\s.,!?'"()]+(?:\.png|\.jpeg|\.jpg|\.gif)$/;
  const error3 = document.getElementById("error3");

  
  if (!image_input.match(possible_image_name)) {
    error3.innerHTML = "invalid image";
  } else {
    error3.innerHTML = "<span style='color:green'> Correct </span>";
  }
}



function   checkLocation() {
  console.log("enter location_input ");

  const location_input = loc.value;
  const possible_content_location = /^[A-Za-z0-9\s.,!?'"()]+$/;
  const error4 = document.getElementById("error4");

  if (!location_input.match(possible_content_location)) {
    error4.innerHTML = "enter a location";
  } else {
    error4.innerHTML = "<span style='color:green'> Correct </span>";
  }
}






/*const user_id = document.getElementById('user_id');
const content = document.getElementById('content');
const image = document.getElementById('image');
const loc = document.getElementById('location');

const form = document.getElementById('frm');
const errorElement = document.getElementById('errorinput');

form.addEventListener('submit', (e) => {
  let messages = [];

  if (user_id.value.trim() === '') {
    messages.push('User ID is required.');
  }

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
});*/