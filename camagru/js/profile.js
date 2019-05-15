
function init(){
    let i = 0;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var data = this.responseText;
          data = JSON.parse(data);
         // console.log(data);
          if (!data)
          {
            var img = document.createElement("img");
            img.src = "/camagru/img/no-content.jpg";
            img.id = "no-content-profile";
            document.getElementById("profile-gallery").appendChild(img);
          }
          for(i = 0;i < data.length;i++){
            var div = document.createElement("div");
            div.id = "myDiv-profile" + data[i][0];
            div.className = "myDiv-profile";
            document.getElementById("profile-gallery").appendChild(div);
            var img = document.createElement("img");
            img.id = "profile-img" + data[i][0];
            img.src = data[i][1];
            img.className = "profile-img";
            document.getElementById(div.id).appendChild(img);
            if (data[i][2])
            {
                var k = 0;
                for(k=0;k<data[i][2].length;k++)
                {
                    var com = document.createElement('div');
                    com.className = "com-profile";
                    document.getElementById(div.id).appendChild(com);
                    com.textContent = data[i][2][k]['username'] +": "+ data[i][2][k]['comment'];
                }
              }
            addButton(div.id, img.src);
          }
      }
    }
    xhttp.open("POST", "/camagru/usr/user_gallery.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify('first'));
}

function add_content(last){
  let i = 0;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var data = this.responseText;
        data = JSON.parse(data);
       // console.log(data);
        if (!data)
            return;
        for(i = 0;i < data.length;i++){
          var div = document.createElement("div");
          div.id = "myDiv-profile" + data[i][0];
          div.className = "myDiv-profile";
          document.getElementById("profile-gallery").appendChild(div);
          var img = document.createElement("img");
          img.id = "profile-img" + data[i][0];
          img.src = data[i][1];
          img.className = "profile-img";
          document.getElementById(div.id).appendChild(img);
          if (data[i][2])
          {
              var k = 0;
              for(k=0;k<data[i][2].length;k++)
              {
                  var com = document.createElement('div');
                  com.className = "com-profile";
                  document.getElementById(div.id).appendChild(com);
                  com.textContent = data[i][2][k]['username'] +": "+ data[i][2][k]['comment'];
              }
            }
          addButton(div.id, img.src);
        }
    }
  }
  xhttp.open("POST", "/camagru/usr/user_gallery.php", true);
  xhttp.setRequestHeader("Content-type", "application/json");
  xhttp.send(JSON.stringify(last));
}

function addButton(div, img_src){

        img_src = img_src.split('camagru');
        var btn = document.createElement("button");
        btn.className = "profile-btn";
        btn.textContent = "Delete picture";
        btn.style.display = "block";
        btn.value = ".." + img_src[1];
       // console.log(btn.value);
        btn.setAttribute("onclick", "del(this)");
        document.getElementById(div).appendChild(btn);
}

function del(btn){
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          //console.log(this.responseText);
            var parent = btn.parentNode;
            parent.remove();
      }
    }
    xhttp.open("POST", "/camagru/usr/delete_usr_picture.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("delete=ok&src=" + btn.value);
}

function infinite_scroll() {
  if (window.pageYOffset >= document.documentElement.offsetHeight - document.documentElement.clientHeight - 50)
  {
      var condition = document.getElementsByClassName("profile-img");
      var last = condition[condition.length - 1];
      last = last.id.split("profile-img")[1];
      if (last > 1)
        add_content(last);
  }
}

document.onscroll = infinite_scroll;

window.onload = init;

