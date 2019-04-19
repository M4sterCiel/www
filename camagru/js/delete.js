function checkForm(event) {
    event.preventDefault();
    if (confirm("You are about to delete your account, are you sure you want to continue?"))
    {
        var passwd = document.getElementById("del-passwd").value;
        var passwd2 = document.getElementById("del-passwd2").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("del-div").innerHTML = this.responseText;
            if (this.responseText == "Your account have been deleted successfully!")
            setTimeout(function(){document.location.replace('/camagru/index.php');}, 3000);
        }
        };
        xhttp.open("POST", "../usr/delete_usr.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("passwd=" + passwd + "&passwd2=" + passwd2);
}
  }
