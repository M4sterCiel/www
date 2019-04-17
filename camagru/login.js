
function checkForm(event) {
    event.preventDefault();
    var mail = document.getElementById("mail-login").value;
    var passwd = document.getElementById("passwd-login").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("log-in").innerHTML = this.responseText;
        setTimeout(function(){document.location.replace('index.php');}, 3000);
      }
    };
    xhttp.open("POST", "test.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("email=" + mail + "&passwd=" + passwd);
    console.log(this.responseText);
    if (this.responseText == 'Access granted!<br/>')
      document.location.replace('index.php');
  }
