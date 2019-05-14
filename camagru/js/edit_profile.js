function init(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var data = JSON.parse(this.responseText);
      //console.log(data);
      document.getElementById("usr-edit").textContent = data[1];
      document.getElementById("mail-edit").textContent = data[2];
      if (data[6] == 1)
        document.getElementById("edit-notif-on").setAttribute("checked", "checked");
      else
        document.getElementById("edit-notif-off").setAttribute("checked", "checked");
    }
  }
  xhttp.open("POST", "/camagru/usr/edit_data.php", true);
  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send(JSON.stringify('first'));
}

function editNotif(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  }
  xhttp.open("POST", "/camagru/usr/edit_data.php", true);
  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send(JSON.stringify('notif'));
}

function editPassword(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var data = (this.responseText);
     // console.log(data);
      document.location.replace("http://localhost:8080/camagru/view/reset_pwd.php?"+data);
    }
  }
  xhttp.open("POST", "/camagru/usr/edit_data.php", true);
  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send(JSON.stringify('password'));
}

function editUsername(){
  event.preventDefault();
  var form = document.getElementById("usr-form-edit");
  var input = document.createElement("input");
  var btn = document.createElement("input");
  input.placeholder = "Type your new username";
  input.className = "edit-input";
  input.id = "edit-input-usr"
  input.style = "width:94%;background-color:lightgrey;";
  form.appendChild(input);
  btn.type = "submit";
  btn.value = "Apply";
  btn.id = "btn-usr-edit";
  btn.style.marginTop = "5%";
  btn.setAttribute("onclick", "changeUsername(event)");
  form.appendChild(btn);
  document.getElementById("usr-edit").style.display = "none";
  document.getElementById("usr-sub-edit").remove();
}

function editEmail(){
  event.preventDefault();
  var form = document.getElementById("mail-form-edit");
  var input = document.createElement("input");
  var btn = document.createElement("input");
  input.placeholder = "Type your new email";
  input.className = "edit-input";
  input.id = "edit-input-mail";
  input.style = "width:94%;background-color:lightgrey;";
  form.appendChild(input);
  btn.type = "submit";
  btn.value = "Apply";
  btn.id = "btn-mail-edit";
  btn.style.marginTop = "5%";
  btn.setAttribute("onclick", "changeEmail(event)");
  form.appendChild(btn);
  document.getElementById("mail-edit").style.display = "none";
  document.getElementById("mail-sub-edit").remove();
}

function changeUsername(event){
  event.preventDefault();
  var value = document.getElementById("edit-input-usr").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var data = (this.responseText);
      console.log(data);
      if (data != ''){
        var wrong = document.createElement("p");
        wrong.textContent = data;
        wrong.style = "color: red;margin-bottom:0;";
        var div = document.getElementById("edit-input-usr");
        document.getElementById("usr-form-edit").insertBefore(wrong, div);
        document.getElementById("usr-form-edit").reset();
        setTimeout(() => {
          wrong.remove();
        }, 5000);
      }
      else{
        document.getElementById("usr-edit").style.display = "inherit";
        document.getElementById("usr-edit").textContent = value;
        document.getElementById("edit-input-usr").remove();
        document.getElementById("btn-usr-edit").remove();
        var btn = document.createElement("input");
        btn.type = "submit";
        btn.value = "Edit your username";
        btn.setAttribute("onclick", "editUsername(event)");
        btn.id = "usr-sub-edit";
        document.getElementById("usr-form-edit").appendChild(btn);
      }
    }
  }
  xhttp.open("POST", "/camagru/usr/edit_data.php", true);
  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send(JSON.stringify({"username":"usr", "value":value}));
}

function changeEmail(event){
  event.preventDefault();
  var value = document.getElementById("edit-input-mail").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var data = (this.responseText);
      console.log(data);
      if (data != ''){
        var wrong = document.createElement("p");
        wrong.textContent = data;
        wrong.style = "color: red;margin-bottom:0;";
        var div = document.getElementById("edit-input-mail");
        document.getElementById("mail-form-edit").insertBefore(wrong, div);
        document.getElementById("mail-form-edit").reset();
        setTimeout(() => {
          wrong.remove();
        }, 5000);
      }
      else{
        document.getElementById("mail-edit").style.display = "inherit";
        document.getElementById("mail-edit").textContent = value;
        document.getElementById("edit-input-mail").remove();
        document.getElementById("btn-mail-edit").remove();
        var btn = document.createElement("input");
        btn.type = "submit";
        btn.value = "Edit your username";
        btn.setAttribute("onclick", "editEmail(event)");
        btn.id = "mail-sub-edit";
        document.getElementById("mail-form-edit").appendChild(btn);
      }
    }
  }
  xhttp.open("POST", "/camagru/usr/edit_data.php", true);
  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send(JSON.stringify({"email":"mail", "value":value}));
}

window.onload = init;