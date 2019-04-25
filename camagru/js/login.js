
function checkForm(event) {
    event.preventDefault();
    var user = document.getElementById("user-login").value;
    var passwd = document.getElementById("passwd-login").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if (this.responseText == "✓ Access granted!")
        {
          setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
          document.getElementById("log-hidden-usr").innerHTML = this.responseText;
          document.getElementById("log-hidden-usr").style = "display: inherit; color: green;";
        }
        else {
          switch (this.responseText) {
            case "✗ Incorrect username or password!":
              document.getElementById("log-hidden-usr").innerHTML = this.responseText;
              document.getElementById("log-hidden-usr").style = "display: inherit;";
              document.getElementById("user-login").style ="background-color: pink;";
              document.getElementById("passwd-login").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("user-login").style ="background-color: white;"; document.getElementById("passwd-login").style ="background-color: white;"; document.getElementById("log-hidden-usr").style = "display: none;"}, 5000);
          }
        }
      }
    };
    xhttp.open("POST", "../usr/check_usr.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("user=" + user + "&passwd=" + passwd);
  }
