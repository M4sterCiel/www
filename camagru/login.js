
function checkForm(event) {
    event.preventDefault();
    var mail = document.getElementById("mail-login").value;
    var passwd = document.getElementById("passwd-login").value;
    console.log(mail);
    console.log(passwd);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("blabla").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "test.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + mail + "&passwd=" + passwd);
  }
