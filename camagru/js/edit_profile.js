function add_usrname_form() {
    var form = document.createElement("form");
    form.id = "usrname-form";
    form.method = "POST";
    document.getElementById("edit-usrname").appendChild(form);
    var input = document.createElement("input");
    input.type = "text";
    input.placeholder = "New username";
    input.id = "nwname";
    document.getElementById("usrname-form").appendChild(input);
    var btn = document.createElement("input");
    btn.type = "submit";
    btn.onclick = "edit_usrname(event)";
    btn.value = "Edit new username";
    document.getElementById("edit-usrname").appendChild(btn);
    var parent = document.getElementById("edit-usrname");
    var old_btn = document.getElementById("btn-usrname");
    parent.removeChild(old_btn);
}

function add_email_form() {
    var form = document.createElement("form");
    form.id = "email-form";
    form.method = "POST";
    document.getElementById("edit-email").appendChild(form);
    var input = document.createElement("input");
    input.type = "text";
    input.placeholder = "New email";
    document.getElementById("email-form").appendChild(input);
    var btn = document.createElement("input");
    btn.type = "submit";
    btn.onclick = "edit_email(event)";
    btn.value = "Edit new email";
    document.getElementById("edit-email").appendChild(btn);
    var parent = document.getElementById("main-div");
    var old_btn = document.getElementById("btn-email");
    parent.removeChild(old_btn);
    
}


function edit_usrname(event) {
    event.preventDefault();
    var nwname = document.getElementById("nwname").value;
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("reset-div").innerHTML = this.responseText;
          if (this.responseText == "Your password has been updated successfully!")
            setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
        }
      };
      xhttp.open("POST", "/camagru/usr/edit_data.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("data=username&nwname=" + nwname);
  
}
function edit_email(event) {
    event.preventDefault();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("reset-div").innerHTML = this.responseText;
          if (this.responseText == "Your password has been updated successfully!")
            setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
        }
      };
      xhttp.open("POST", "/camagru/usr/edit_data.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("data=email");
  
}
function edit_pwd(event) {
    event.preventDefault();
    var usr = document.getElementsByName("usrname").value;
      xhttp.open("GET", "/camagru/view/reset_pwd.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("usr=" + usr + "&data=password");
  
}