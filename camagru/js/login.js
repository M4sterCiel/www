
function checkForm(event) {
    event.preventDefault();
    var user = document.getElementById("user-login").value;
    var passwd = document.getElementById("passwd-login").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("log-in").innerHTML = this.responseText;
        if (this.responseText == "✓ Access granted!")
        {
          setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
          document.getElementById("log-in").style = "border-radius: 15px; width: 40%; margin: 0 auto; margin-bottom: 2%; padding: 2%; background-color: lightgreen; text-align: center;";
        }
        else {
          document.getElementById("log-in").style = "border-radius: 15px; width: 40%; margin: 0 auto; margin-bottom: 2%; padding: 2%; background-color: pink; text-align: center;";
        }
      }
    };
    xhttp.open("POST", "../usr/check_usr.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("user=" + user + "&passwd=" + passwd);
  }
