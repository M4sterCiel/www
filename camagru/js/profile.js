
function init(){
    let i = 0;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var data = this.responseText;
          data = JSON.parse(data);
          for(i = 0;i < data.length;i++){
            var div = document.createElement("div");
            div.id = "myDiv-profile" + data[i][0];
            document.getElementById("profile-gallery").appendChild(div);
            var img = document.createElement("img");
            img.id = "profile-img" + data[i][0];
            img.src = data[i][1];
            img.className = "profile-img";
            document.getElementById(div.id).appendChild(img);
            addButton(div.id, img.src);
          }
      }
    }
    xhttp.open("POST", "/camagru/usr/user_gallery.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send("display=ok&src=lol");
}

function addButton(div, img_src){
//    var matches = document.getElementsByClassName("profile-img");

        var btn = document.createElement("button");
        btn.className = "profile-btn";
        btn.textContent = "Delete";
        btn.value = decodeURI(img_src);
        btn.setAttribute("onclick", "del(this)");
        document.getElementById(div).appendChild(btn);
        //parent.insertBefore(btn, matches[i + 1]);
      
}

function del(btn){

    console.log((btn.value));
    /* var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

      }
    xhttp.open("POST", "/camagru/usr/delete_usr_picture.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("delete=ok&src" + btn.value);
    } */
}

window.onload = init;

