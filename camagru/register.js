function checkForm(event) {
    event.preventDefault();
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var mail = document.getElementById("reg-mail").value;
    var passwd = document.getElementById("reg-passwd").value;
    var question = document.getElementById("private-quest").options[document.getElementById('private-quest').selectedIndex].text; 
    var answer = document.getElementById("reg-answer").value;
    var notif = document.getElementById("reg-ok-notif").checked ? 1 : 0;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("register").innerHTML = this.responseText;
      }
    };
    xhttp.open("POST", "add_user.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("fname=" + fname + "&lname=" + lname + "&email=" + mail + "&passwd=" + passwd + "&question=" + question + "&answer=" + answer + "&notif=" + notif);
  }