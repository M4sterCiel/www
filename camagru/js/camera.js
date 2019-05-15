
var layer_img = '';
var imageCapture = 0;
var selected = 0;
var noVideo = 0;


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
      
    }).catch(function(err) { 
        console.log(err.name + ": " + err.message);
        noVideo = 1;
        let img = document.createElement("img");
        img.src = "/camagru/img/no-image.png";
        img.style.width = "100%";
        img.style.marginLeft = "10%";
        img.id = "no-image";
        document.getElementById("source-cam-div").appendChild(img);
        document.getElementById("sourcevid").style = "display: none;";
        selected = 1;
     });

}

function clone(){
    selected = 1;
    document.getElementById("file").setAttribute("disabled", "");
    if (noVideo == 0 && imageCapture == 0){
        var vivi = document.getElementById('sourcevid');
        var canvas1 = document.getElementById('cvs').getContext('2d');
        canvas1.drawImage(vivi, 0,0, 800, 600);
        var base64 = document.getElementById('cvs').toDataURL("image/png");	//l'image au format base 64
    }
    else{
        var base64 = document.getElementById("picture").src;
    }
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) 
      {
        //console.log(this.responseText);
        var src = this.responseText;
        var img = document.createElement("img");
        img.src = src;
        img.style = "width:120%;";
        img.id = "gallery-img";
        document.getElementById("source-cam-div").appendChild(img);
        createButton(src);
        if (noVideo == 0 && imageCapture == 0)
            document.getElementById("sourcevid").style = "display: none;";
        else if (noVideo == 0 && imageCapture == 1)
            document.getElementById("picture").remove();
        else
            document.getElementById("picture").remove();
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
            //console.log(this.responseText);
            document.getElementById("gallery-img").remove();
            document.getElementById("btn1").remove();
            document.getElementById("btn2").remove();
            if (noVideo == 0)
            {
                document.getElementById("sourcevid").style = "display:inline";
                if (imageCapture)
                    document.getElementById("myForm").reset();
            }
            else
            {
                let img = document.createElement("img");
                img.src = "/camagru/img/no-image.png";
                img.style.width = "100%";
                img.style.marginLeft = "10%";
                img.id = "no-image";
                document.getElementById("source-cam-div").appendChild(img);
                document.getElementById("myForm").reset();
            }
            document.getElementById("file").removeAttribute("disabled");
            imageCapture = 0;
            disable_btn();
            if (noVideo == 0)
                selected = 0;
            else
                selected = 1;
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
           // console.log(this.responseText);
            let img = document.createElement("img");
            img.src = btn.value;
            document.getElementById("gallery-cam").appendChild(img);
            document.getElementById("gallery-img").remove();
            document.getElementById("btn1").remove();
            document.getElementById("btn2").remove();
            if (noVideo == 0)
            {
                selected = 0;
                if (document.getElementById("no-photo-camera"))
                {
                    document.getElementById("no-photo-camera").remove();
                    document.getElementById("no-photo-msg").remove();
                }
                document.getElementById("sourcevid").style = "display:inline";
                if (imageCapture == 1)
                    document.getElementById("myForm").reset();
            }
            else
            {
                if (document.getElementById("no-photo-camera"))
                    document.getElementById("no-photo-camera").remove();
                    document.getElementById("no-photo-msg").remove();
                let img = document.createElement("img");
                img.src = "/camagru/img/no-image.png";
                img.style.width = "100%";
                img.style.marginLeft = "10%";
                img.id = "no-image";
                document.getElementById("source-cam-div").appendChild(img);
                document.getElementById("myForm").reset();
                selected = 1;
            }
            document.getElementById("file").removeAttribute("disabled");
            imageCapture = 0;
            disable_btn();
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

function upload(files){
    if (!files[0])
        return;
    if (imageType(files) == false)
    {
        alert("Incorrect format file. Please, insert a jpeg or png file. Maximum size: 5Mo.");
        document.getElementById("myForm").reset();
        return;
    }
    imageCapture = 1;
    if (noVideo == 1)
    {
        if (document.getElementById("sourcevid"))
            document.getElementById("sourcevid").remove();
        document.getElementById("no-image").remove();
    }
    else
        document.getElementById("sourcevid").style = "display: none;";
    createThumbnail(files[0]);
}

function createThumbnail(files){
    var reader = new FileReader();
    reader.addEventListener('load', function() {
    
        if (document.getElementById("picture"))
            document.getElementById("picture").remove();
        var imgElement = document.createElement('img');
        imgElement.style.width = '120%';
        imgElement.src = this.result;
        imgElement.id = "picture";
        document.getElementById("source-cam-div").appendChild(imgElement);
        selected = 0;
    });
    reader.readAsDataURL(files);
}

function createButton(src){
    let parentDiv = document.getElementById("cam-btn").parentNode;
    let button = document.getElementById("cam-btn");
    var btn1 = document.createElement("button");
    btn1.textContent = "Save";
    btn1.value = src;
    btn1.id = "btn1";
    btn1.className = "picture-btn";
    btn1.setAttribute("onclick", "save(this)");
    btn1.style = button.style;
    var btn2 = document.createElement("button");
    btn2.textContent = "Delete";
    btn2.id = "btn2";
    btn2.value = src;
    btn2.className = "picture-btn";
    btn2.setAttribute("onclick", "del(this)");
    btn2.style = button.style;
    parentDiv.insertBefore(btn1, button);
    parentDiv.insertBefore(btn2, button);
}

function imageType(files){
    let type = files[0].type.split('/');
    if (type[1] != 'png' && type[1] != 'jpeg')
        return false;
    if (files[0].size > 5500000)
        return false;
    return true;
}

window.onload = init;
