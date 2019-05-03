
var layer_img = '';
var imageCapture;
var selected = 0;

function init() {

    navigator.mediaDevices.getUserMedia({ audio: false, video: { width: 800, height: 600 } }).then(function(mediaStream) {
        
        var video = document.getElementById('sourcevid');
        video.srcObject = mediaStream;

        video.onloadedmetadata = function(e) {
            video.play();
            setTimeout(() => {
                video.ended;
            }, 5000);
        };
      
    }).catch(function(err) { console.log(err.name + ": " + err.message); });

}

function clone(){
    selected = 1;
    var vivi = document.getElementById('sourcevid');
    var canvas1 = document.getElementById('cvs').getContext('2d');
    canvas1.drawImage(vivi, 0,0, 800, 600);
    var base64 = document.getElementById('cvs').toDataURL("image/png");	//l'image au format base 64
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) 
      {
        console.log(this.responseText);
        var src = this.responseText.split("../");
        var img = document.createElement("img");
        img.src = src[1];
        img.style = "width:120%;";
        img.id = "gallery-img";
        document.getElementById("source-cam-div").appendChild(img);
        var btn1 = document.createElement("button");
        btn1.textContent = "Save";
        btn1.value = src[1];
        btn1.id = "btn1";
        btn1.setAttribute("onclick", "save(this)");
        btn1.style = "margin-left: 15%; width: 30%;";
        var btn2 = document.createElement("button");
        btn2.textContent = "Delete";
        btn2.value = src[1];
        btn2.id = "btn2";
        btn2.setAttribute("onclick", "del(this)");
        btn2.style = "margin-left: 20%; width: 35%;";
        document.getElementById("source-cam-div").appendChild(btn1);
        document.getElementById("source-cam-div").appendChild(btn2);
        document.getElementById("sourcevid").style = "display: none;";
        document.getElementById("vid-img").remove();
        disable_btn();
      }
    };
    xhttp.open("POST", "/camagru/usr/image.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("image=" + base64 + "&layer=" + layer_img);
}

function layer(img) {
    if (selected == 1)
        return;
    var calque = document.getElementsByClassName('layer-img');
    for(var i=0; i<calque.length; i++){
        calque[i].style = "border: none;";}
    img.style = "border: 2px solid blue;"
    var layer = document.createElement('img');
    layer.src = img.src;
    layer.alt = img.alt;
    layer_img = img.src;
    layer_img = layer_img.split("img/")[1];
    layer.style = "position: absolute;"
    layer.id = "vid-img";
    if (document.getElementById("vid-img") == null)
    {
        document.getElementById("source-cam-div").prepend(layer);
    }
    else
    {
        var video = document.getElementById("source-cam-div");
        var div = document.getElementById("vid-img");
        video.replaceChild(layer, div);
    }
    var btn = document.getElementById("cam-btn");
    btn.removeAttribute("disabled");
    btn.setAttribute("onclick", "clone()");
}

function del(btn) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) 
        {
            console.log(this.responseText);
            document.getElementById("gallery-img").remove();
            document.getElementById("btn1").remove();
            document.getElementById("btn2").remove();
            document.getElementById("sourcevid").style = "display:inline";
            disable_btn();
            selected = 0;
        }
    }
    xhttp.open("POST", "/camagru/usr/pic_action.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("delete=ok&src=" + btn.value);
}

function save(btn) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) 
        {
            console.log(this.responseText);
            let img = document.createElement("img");
            img.src = btn.value;
            document.getElementById("gallery-cam").appendChild(img);
            document.getElementById("gallery-img").remove();
            document.getElementById("btn1").remove();
            document.getElementById("btn2").remove();
            document.getElementById("sourcevid").style = "display:inline";
            disable_btn();
            selected = 0;
            
        }
    }
    xhttp.open("POST", "/camagru/usr/pic_action.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("save=ok&src=" + btn.value);
}

function disable_btn(){
    var btn = document.getElementById("cam-btn");
    btn.setAttribute("onclick", "");
    btn.setAttribute("disabled", "");
}

function upload(event){
    event.preventDefault();
    console.log("plop");
}
window.onload = init;