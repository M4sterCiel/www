document.getElementById("reg-submit").onclick = function (event) {
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
      if (this.readyState == 4 && this.status == 200) 
      {
        if(this.responseText == "✔ An email has been sent with the activation link!")
        {
         setTimeout(function(){location.replace('/camagru/index.php');}, 4000);
          document.getElementById("register-div").innerHTML = this.responseText;
          document.getElementById("register-div").style = "display: block; color: green; font-size: 150%;";
          var $groupe = document.getElementById('groupe');
          $groupe.disabled = !$groupe.disabled;
        }
        else 
        {
          console.log(this.responseText);
          switch (this.responseText) {
            case "This username already exists":
              document.getElementById("reg-hidden-usr").innerHTML = '  ✘' + ' ' + this.responseText;
              document.getElementById("reg-hidden-usr").style = "display: inherit;";
              document.getElementById("username").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("username").style ="background-color: lightgrey;";
              document.getElementById("reg-hidden-usr").style = "display: none;"}, 5000);
              break;
            case "Username must not contain whitespaces":
              document.getElementById("reg-hidden-usr").innerHTML = '  ✘' + ' ' + this.responseText;
              document.getElementById("reg-hidden-usr").style = "display: inherit;";
              document.getElementById("username").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("username").style ="background-color: lightgrey;";
              document.getElementById("reg-hidden-usr").style = "display: none;"}, 5000);
              break;
            case "Please, enter a correct username":
              document.getElementById("reg-hidden-usr").innerHTML = '  ✘' + ' ' + this.responseText;
              document.getElementById("reg-hidden-usr").style = "display: inherit;";
              document.getElementById("username").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("username").style ="background-color: lightgrey;";
              document.getElementById("reg-hidden-usr").style = "display: none;"}, 5000);
              break;
            case "This email already exists":
              document.getElementById("reg-hidden-mail").innerHTML = '  ✘' + ' ' + this.responseText;
              document.getElementById("reg-hidden-mail").style = "display: inherit;";
              document.getElementById("reg-mail").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("reg-mail").style ="background-color: lightgrey;";
              document.getElementById("reg-hidden-mail").style = "display: none;";}, 5000);
              break;
            case "Please, enter a correct e-mail address":
              document.getElementById("reg-hidden-mail").innerHTML = '  ✘' + ' ' + this.responseText;
              document.getElementById("reg-hidden-mail").style = "display: inherit;";
              document.getElementById("reg-mail").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("reg-mail").style ="background-color: lightgrey;";
              document.getElementById("reg-hidden-mail").style = "display: none;"}, 5000);
              break;
            case "Wrong password!":
              document.getElementById("reg-hidden-pwd").innerHTML = '  ✘' + ' ' + this.responseText;
              document.getElementById("reg-hidden-pwd").style = "display: inherit;";
              document.getElementById("reg-passwd2").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("reg-passwd2").style ="background-color: lightgrey;"; document.getElementById("reg-hidden-pwd").style = "display: none;"}, 5000);
              break;
            case "Password should respect this pattern (UpperCase, LowerCase, Number/SpecialChar and min 8 Chars)!":
              document.getElementById("reg-hidden-pwd").innerHTML = '  ✘' + ' ' + this.responseText;
              document.getElementById("reg-hidden-pwd").style = "display: inherit;";
              document.getElementById("reg-passwd").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("reg-passwd").style ="background-color: lightgrey;"; document.getElementById("reg-hidden-pwd").style = "display: none;"}, 5000);
              break;
            case "Empty answer":
              document.getElementById("reg-hidden-answer").innerHTML = '  ✘' + ' ' + this.responseText;
              document.getElementById("reg-hidden-answer").style = "display: inherit;";
              document.getElementById("reg-answer").style ="background-color: pink;";
              setTimeout(function(){document.getElementById("reg-answer").style ="background-color: lightgrey;"; document.getElementById("reg-hidden-answer").style = "display: none;"}, 5000);
              break;
          }
        }
      }
    };
    xhttp.open("POST", "/camagru/usr/add_user.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("username=" + username + "&email=" + mail + "&passwd=" + passwd + "&passwd2=" + passwd2 + "&question=" + question + "&answer=" + answer + "&notif=" + notif);
}
