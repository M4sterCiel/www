
function init(){
    let i = 0;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var data = this.responseText;
          data = JSON.parse(data);
       //   console.log(data);
          for(i = 0;i < data.length;i++){
            var div = document.createElement("div");
            div.id = "myDiv-index" + data[i][0];
            document.getElementById("index-gallery").appendChild(div);
            var usr = add_username(data[i][3]);
            console.log(usr);
            var img = document.createElement("img");
            img.id = "index-img" + data[i][0];
            img.src = data[i][1].substring(3);
            img.className = "index-img";
            document.getElementById(div.id).appendChild(img);
          }
      }
    }
    xhttp.open("POST", "/camagru/usr/gallery.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify('first'));
}

function infinite_scroll() {
    /* console.log(document.documentElement.clientHeight);
    console.log(document.documentElement.offsetHeight);
    console.log(window.pageYOffset); */
    if (window.pageYOffset >= document.documentElement.offsetHeight - document.documentElement.clientHeight - 50)
    {
        var condition = document.querySelectorAll("img");
        var last = condition[condition.length - 1];
        last = last.id.split("index-img")[1];
        add_content(last);
    }
}

function add_content(last){
    let i = 0;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var data = this.responseText;
          data = JSON.parse(data);
          if (!data)
            return;
          for(i = 0;i < data.length;i++){
            var div = document.createElement("div");
            div.id = "myDiv-index" + data[i][0];
            document.getElementById("index-gallery").appendChild(div);
            var img = document.createElement("img");
            img.id = "index-img" + data[i][0];
            img.src = data[i][1].substring(3);
            img.className = "index-img";
            document.getElementById(div.id).appendChild(img);
          }
      }
    }
    xhttp.open("POST", "/camagru/usr/reload_gallery.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(last));
}

function add_username(user){
//    console.log(user);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = this.responseText;
            data = JSON.parse(data);
            //console.log(data[0]);
            return (data[0]);
        }
      }
    xhttp.open("POST", "/camagru/usr/gallery.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(user));
}

document.onscroll = infinite_scroll;

window.onload = init;