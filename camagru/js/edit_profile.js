function add_usrname_form() {
    var form = document.createElement("form");
    form.id = "usrname-form";
    form.method = "POST";
    document.getElementById("edit-usrname").appendChild(form);
    var input = document.createElement("input");
    input.type = "text";
    input.placeholder = "New username";
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

function edit_usrname(event) {
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
      xhttp.send("data=username");
  
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
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("reset-div").innerHTML = this.responseText;
          if (this.responseText == "Your password has been updated successfully!")
            setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
        }
      };
      xhttp.open("POST", "/camagru/usr/edit_data.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("data=password");
  
}