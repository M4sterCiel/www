function checkForm(event) {
    event.preventDefault();
    var nwpwd = document.getElementById("nwpwd").value;
    var nwpwd2 = document.getElementById("nwpwd2").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("reset-div").innerHTML = this.responseText;
        if (this.responseText == "Your password has been updated!")
          setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
      }
    };
    xhttp.open("POST", "../usr/nw_pwd.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nwpwd=" + nwpwd + "&nwpwd2=" + nwpwd2);
  }
