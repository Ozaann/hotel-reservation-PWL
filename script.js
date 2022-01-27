function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
var expanded = false;

function showCheckboxes() {
  var checkboxes = document.getElementById("checkboxes");
  if (!expanded) {
    checkboxes.style.display = "block";
    expanded = true;
  } else {
    checkboxes.style.display = "none";
    expanded = false;
  }
}

function openLoginForm(){
  document.body.classList.add("showLoginForm");
}
function closeLoginForm(){
  document.body.classList.remove("showLoginForm");
}
function openLoginForm2(){
  document.body.classList.add("showLoginForm-2");
}
function closeLoginForm2(){
  document.body.classList.remove("showLoginForm-2");
}

document.querySelector('.submt').onclick = function() {
  var a = document.querySelector('.password2').value,
      b = document.querySelector('.password22').value;
  var chek = document.getElementById('check');
  var uname = document.getElementById('username');
  var mail = document.getElementById('email')
    if (a == "") {
      document.getElementById("errorelement").innerHTML ="*Please fill the password"
      return false
    }
    else if (a.length < 6) {
      document.getElementById("errorelement").innerHTML ="*Password must atleas contains 6 characters"
      return false
    }
    else if (a != b) {
      document.getElementById("errorelement").innerHTML ="*Password did not match"
      return false
    }
    if (a == b) {
      return true
    }
}
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
