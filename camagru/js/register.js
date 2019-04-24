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
      if (this.readyState == 4 && this.status == 200 && this.responseText == "<div id=\"register-ok\">An email has been sent with the activation link!<div><br>") {
        document.getElementById("register").innerHTML = this.responseText;
        setTimeout(function(){document.location.replace('../index.php');}, 3000);
      }
      else {
        console.log(this.responseText);
        switch (this.responseText) {
          case "This username already exists":
            document.getElementById("username").style ="background-color: pink;";
            setTimeout(function(){document.getElementById("username").style ="background-color: white;";}, 5000);
            break;
          case "This email already exists":
            document.getElementById("reg-mail").style ="background-color: pink;";
            setTimeout(function(){document.getElementById("reg-mail").style ="background-color: white;";}, 5000);
            break;
          case "Wrong password!":
            document.getElementById("reg-passwd2").style ="background-color: pink;";
            setTimeout(function(){document.getElementById("reg-passwd2").style ="background-color: white;";}, 5000);
            break;
          case "Password should respect this pattern (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)!":
            document.getElementById("reg-passwd").style ="background-color: pink;";
            setTimeout(function(){document.getElementById("reg-passwd").style ="background-color: white;";}, 5000);
            break;
          case "Empty answer":
            document.getElementById("reg-answer").style ="background-color: pink;";
            setTimeout(function(){document.getElementById("reg-answer").style ="background-color: white;";}, 5000);
            break;
        }
      }
    };
    xhttp.open("POST", "../usr/add_user.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username + "&email=" + mail + "&passwd=" + passwd + "&passwd2=" + passwd2 + "&question=" + question + "&answer=" + answer + "&notif=" + notif);
  }