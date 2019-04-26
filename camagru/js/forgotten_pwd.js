function checkForm(event) {
    event.preventDefault();
    var user = document.getElementById("usr-fpwd").value;
    var answer = document.getElementById("answer-pwd").value;
    var question = document.getElementById("private-quest").options[document.getElementById('private-quest').selectedIndex].text; 
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("forgotten-div").innerHTML = this.responseText;
        if (this.responseText == "✔ An email has been sent to you with the procedure to re-initialize your password!") {
          document.getElementById("forgotten-div").style = "display: inherit; color: green;";
          setTimeout(function(){document.location.replace('/camagru/index.php');}, 5000);
          var $groupe = document.getElementById('groupe');
          $groupe.disabled = !$groupe.disabled;
        }
        else {
          document.getElementById("forgotten-div").style = "display: inherit;";
          setTimeout(() => {
            document.getElementById("forgotten-div").style = "display: none;";
          }, 5000);
        }
      }
    };
    xhttp.open("POST", "../usr/init_pwd.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("user=" + user + "&answer=" + answer + "&question=" + question);
  }
