

function uniqid() {
    return (new Date().getTime() + Math.floor((Math.random()*10000)+1)).toString(16);
}

function addLike(img){

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        //console.log(this.responseText);
        var data = this.responseText;
        var line = "likes"+img;
        if (data > 0)
            document.getElementById(line).textContent = data;
        else
            document.getElementById(line).textContent = '';
      }
    }
    xhttp.open("POST", "/camagru/usr/likes.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(img));
}

function addComment(pic){
    
    var input = document.getElementById("area"+pic);
    var value = input.value;
   // console.log(input.value);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          console.log(this.responseText);
      }
    }
    xhttp.open("POST", "/camagru/usr/comment.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify({"picture":pic, "text":value}));
}

function addButtonLike(img, nb, pic){
    
    var div = document.createElement("div");
    div.id = uniqid();
    document.getElementById(img).appendChild(div);
    var like = document.createElement("img");
    like.src = "/camagru/img/heart.png";
    like.className = "like-btn";
    like.id = uniqid();
    var nblike = document.createElement('p');
    nblike.id = "likes"+pic;
    like.setAttribute("onclick", "addLike(" + pic + ")");
    like.style.width = "4%";
    like.style.cursor = "pointer";
    document.getElementById(div.id).appendChild(like);
    if (nb > 0)
        nblike.textContent = "  " + nb;
    nblike.style.display = "inline";
    document.getElementById(div.id).appendChild(nblike);
}

function addButtonComment(img, pic){
    var btn = document.createElement("button");
    var area = document.createElement("input");
    area.type = "text";
    area.style.minHeight = "2vw";
    area.placeholder = "Write a comment...";
    area.style.width = "49%";
    area.style.display = "block";
    area.style.borderRadius = "15px";
    area.id = "area" + pic;
    btn.setAttribute("onclick", "addComment("+pic+")");
    btn.textContent = "Comment";
    document.getElementById(img).appendChild(area);
    document.getElementById(img).appendChild(btn);
}

function init(){
    let i = 0;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          var data = this.responseText;
          data = JSON.parse(data);
        //  console.log(data);
          if (!data)
          {
            var img = document.createElement("img");
            img.src = "/camagru/img/no-content.jpg";
            img.id = "no-content-index";
            document.getElementById("index-gallery").appendChild(img);
          }
          for(i = 0;i < data.length;i++){
            var div = document.createElement("div");
            div.id = "myDiv-index" + data[i][0];
            document.getElementById("index-gallery").appendChild(div);
            var username = document.createElement("p");
            username.textContent = data[i][3];
            username.style.color = "darkblue";
            document.getElementById(div.id).appendChild(username);
            var img = document.createElement("img");
            img.id = "index-img" + data[i][0];
            img.src = data[i][1].substring(3);
            img.style.width = "50%";
            img.className = "index-img";
            document.getElementById(div.id).appendChild(img);
            addButtonLike(div.id, data[i][2], data[i][0]);
            if (data[i][5])
            {
                var com = document.createElement('div');
                com.id = "com-index" + data[i][0];
                document.getElementById(div.id).appendChild(com);
                document.getElementById(com.id).innerHTML = data[i][5][0]['comment'];
            }
            addButtonComment(div.id, data[i][0]);
          }
      }
    }
    xhttp.open("POST", "/camagru/usr/gallery.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify('first'));
}

function infinite_scroll() {
    if (window.pageYOffset >= document.documentElement.offsetHeight - document.documentElement.clientHeight - 50)
    {
        var condition = document.getElementsByClassName("index-img");
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
            var username = document.createElement("p");
            username.textContent = data[i][3];
            username.style.color = "darkblue";
            document.getElementById(div.id).appendChild(username);
            var img = document.createElement("img");
            img.id = "index-img" + data[i][0];
            img.src = data[i][1].substring(3);
            img.className = "index-img";
            img.style.width = "50%";
            document.getElementById(div.id).appendChild(img);
            addButtonLike(div.id, data[i][2], data[i][0]);
            if (data[i][5])
            {
                var com = document.createElement('div');
                com.id = "com-index" + data[i][0];
                document.getElementById(div.id).appendChild(com);
                document.getElementById(com.id).innerHTML = data[i][5][0]['comment'];
            }
            addButtonComment(div.id, data[i][0]);
          }
      }
    }
    xhttp.open("POST", "/camagru/usr/reload_gallery.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(JSON.stringify(last));
}


document.onscroll = infinite_scroll;

window.onload = init;