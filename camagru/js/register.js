function checkForm(event) {
    event.preventDefault();
    var username = document.getElementById("username").value;
    var mail = document.getElementById("reg-mail").value;
    var passwd = document.getElementById("reg-passwd").value;
    var passwd2 = document.getElementById("reg-passwd2").value;
    var question = document.getElementById("private-quest").options[document.getElementById('private-quest').selectedIndex].text; 
    var answer = document.getElementById("reg-answer").value;
    var notif = document.getElementById("reg-ok-notif").checked ? 1 : 0;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("register").innerHTML = this.responseText;
        if (this.responseText == "Successfully registered!")
            setTimeout(function(){document.location.replace('index.php');}, 3000);
      }
    };
    xhttp.open("POST", "usr/add_user.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username + "&email=" + mail + "&passwd=" + passwd + "&passwd2=" + passwd2 + "&question=" + question + "&answer=" + answer + "&notif=" + notif);
  }