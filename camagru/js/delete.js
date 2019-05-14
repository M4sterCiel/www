function checkForm(event) {
    event.preventDefault();
    if (confirm("You are about to delete your account, are you sure you want to continue?"))
    {
        var passwd = document.getElementById("del-passwd").value;
        var passwd2 = document.getElementById("del-passwd2").value;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            document.getElementById("del-div").innerHTML = this.responseText;
            if (this.responseText == "✓ Your account have been deleted successfully!")
            {
                setTimeout(function(){document.location.replace('/camagru/view/logout.php');}, 3000);
                document.getElementById("del-div").style = "display: inherit; color: green;";
                var $groupe = document.getElementById('groupe');
                $groupe.disabled = !$groupe.disabled;
            }
            else {
                document.getElementById("del-div").style = "display: inherit;";
            }
        }
        else
            document.getElementById("del-form").reset();
        };
        xhttp.open("POST", "../usr/delete_usr.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("passwd=" + passwd + "&passwd2=" + passwd2);
}
  }
