tab = new Array;

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
    var vivi = document.getElementById('sourcevid');
    var canvas1 = document.getElementById('cvs').getContext('2d');
    canvas1.drawImage(vivi, 0,0, 150, 112);
    var base64=document.getElementById('cvs').toDataURL("image/png");	//l'image au format base 64
    document.getElementById('tar').value='';
    document.getElementById('tar').value=base64;
}

function layer(img) {
    var calque = document.getElementsByClassName('layer-img');
    for(var i=0; i<calque.length; i++){
        calque[i].style = "border: none;";}
    img.style = "border: 2px solid blue;"
    var layer = document.createElement('img');
    layer.src = img.src;
    layer.alt =  img.alt;
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

window.onload = init;