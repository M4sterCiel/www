function checkForm(event) {
    event.preventDefault();
    var nwpwd = document.getElementById("nwpwd").value;
    var nwpwd2 = document.getElementById("nwpwd2").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("reset-div").innerHTML = this.responseText;
        if (this.responseText == "✔ Your password has been updated successfully!") {
          setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
          document.getElementById("reset-div").style = "border-radius: 15px; width: 40%; margin: 0 auto; margin-bottom: 2%; padding: 2%; background-color: lightgreen; text-align: center;";
        }
        else {
          document.getElementById("reset-div").style = "border-radius: 15px; width: 40%; margin: 0 auto; margin-bottom: 2%; padding: 2%; background-color: pink; text-align: center;";
        }
      }
    };
    xhttp.open("POST", "/camagru/usr/nw_pwd.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nwpwd=" + nwpwd + "&nwpwd2=" + nwpwd2);
  }
