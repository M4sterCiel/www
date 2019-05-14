function noLogin(){
    var div = document.getElementById("hidden-div-header");
    div.style.display = "block";
    div.style.fontSize = "130%";
    div.style.backgroundColor = "pink";
    div.textContent = "You must be logued on to access this area."
    setTimeout(function(){
        div.style.display = "none";
    }, 10000);
}