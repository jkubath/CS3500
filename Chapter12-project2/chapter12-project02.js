function clearErrorMessagE(id) {
  var spanId = 'error' + id;
  var span = document.getElementById(spanID);
  var divId = 'control' + id;
  var div = document.getElementById(divId);
}

function resetMessage() {
  document.getElementById('first').style.backgroundColor = 'white';
  document.getElementById('first').style.color = 'black';
}

function resetMessage1() {
  document.getElementById('last').style.backgroundColor = 'white';
  document.getElementById('last').style.color = 'black';
}

function resetMessage2() {
  document.getElementById('email').style.backgroundColor = 'white';
  document.getElementById('email').style.color = 'black';
}

function resetMessage3() {
  document.getElementById('password1').style.backgroundColor = 'white';
  document.getElementById('password1').style.color = 'black';
}

function resetMessage4() {
  document.getElementById('password2').style.backgroundColor = 'white';
  document.getElementById('password2').style.color = 'black';
}


function init() {
  //alert("In init");
  var form = document.getElementById("mainForm");
  form.onsubmit = validateForm;

  var first = document.getElementById("first");
  var last = document.getElementById("last");
  var email = document.getElementById("email");
  var password1 = document.getElementById("password1");
  var password2 = document.getElementById("password2");
  var checkbox = document.getElementById("checkbox");


  first.onchange = resetMessage;
  last.onchange = resetMessage1;
  email.onchange = resetMessage2;
  password1.onchange = resetMessage3;
  password2.onchange = resetMessage4;

  }//End of initialization

function addErrorMessage(id, msg) {
  var spanID = 'error' + id;
  var span = document.getElementById(spanID);
  var divID = 'control' + id;
  var div = document.getElementById(divID);

  if(span) span.innerHTML = msg;
  if(div) div.className = div.className + " error";
}

function validateForm() {
  var errorFlag = false;
  var emailReg = /^(.+)@([^\.].*)\.([a-z]{2,})$/;
  var nameReg = /^[a-zA-Z]{1,20}$/;
  var passReg = /^[a-zA-Z]\w{8,16}$/;

  if(! nameReg.test(first.value)) {
    document.getElementById('first').style.backgroundColor = 'red';
    document.getElementById('first').style.color = 'white';
    errorFlag = true;
  }

  if(! nameReg.test(last.value)) {
    document.getElementById('last').style.backgroundColor = 'red';
    document.getElementById('last').style.color = 'white';
      errorFlag = true;
  }

  if(! emailReg.test(email.value)) {
    document.getElementById('email').style.backgroundColor = 'red';
    document.getElementById('email').style.color = 'white';
    errorFlag = true;
  }

  if(! passReg.test(password1.value)) {
    document.getElementById('password1').style.backgroundColor = 'red';
    document.getElementById('password1').style.color = 'white';
      errorFlag = true;
  }

  if(! passReg.test(password2.value)) {
    document.getElementById('password2').style.backgroundColor = 'red';
    document.getElementById('password2').style.color = 'white';
      errorFlag = true;
  }

  if(!(password1.value == password2.value)){
    document.getElementById('password2').style.backgroundColor = 'red';
    document.getElementById('password2').style.color = 'white';
      errorFlag = true;
  }

  if(checkbox.checked != true) {
    //alert("Checkbox");
    alert("Agree to the Privacy Statement");
      errorFlag = true;
  }

  if(!errorFlag)
    return true;
  else{
    if(Event.preventDefault){
      Event.preventDefault();
    } else {
      Event.returnValue = false;
    }
    return false;

  }
}
