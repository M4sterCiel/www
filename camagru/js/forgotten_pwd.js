function checkForm(event) {
    event.preventDefault();
    var user = document.getElementById("usr-fpwd").value;
    var answer = document.getElementById("answer-pwd").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("forgotten-div").innerHTML = this.responseText;
        if (this.responseText == "✔ An email has been sent to you with the procedure to re-initialize your password!") {
          setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
          document.getElementById("forgotten-div").style = "border-radius: 15px; width: 40%; margin: 0 auto; margin-bottom: 2%; padding: 2%; background-color: lightgreen; text-align: center;";
        }
        else {
          document.getElementById("forgotten-div").style = "border-radius: 15px; width: 40%; margin: 0 auto; margin-bottom: 2%; padding: 2%; background-color: pink; text-align: center;";
        }
      }
    };
    xhttp.open("POST", "../usr/init_pwd.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("user=" + user + "&answer=" + answer);
  }
