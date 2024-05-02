

const form = document.getElementById("frm");
const user_id = document.getElementById("user_id");
const comment = document.getElementById("comment");



form.addEventListener("submit", function (event) {
  console.log("enter form input control");
  event.preventDefault();
  checkUser_id();
 checkComment();

  //checkPassword()
  console.log ( "the actual value is ");

  console.log ( document.getElementById("error1").innerHTML);

  if (
    document.getElementById("error1").innerHTML === "<span style=\"color:green\"> Correct </span>" &&
    document.getElementById("error2").innerHTML === "<span style=\"color:green\"> Correct </span>" 
  
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


function checkComment() {
  console.log("enter comment_input ");

  const comment_input = comment.value;
  const possible_comment = /^[A-Za-z0-9\s.,!?'"()]+$/;
  const error2 = document.getElementById("error2");

  if (!comment_input.match(possible_comment)) {
    error2.innerHTML = "enter a comment";
  } else {
    error2.innerHTML = "<span style='color:green'> Correct </span>";
  }
}


