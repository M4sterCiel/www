var button = document.getElementById("submit-login");
button.addEventListener("click", checkform());

function checkform() {
var newName = document.getElementsByName('email').values(),
    xhr = new XMLHttpRequest();
console.log(newName);
xhr.open('POST', 'plop.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send(encodeURI('name=' + newName));
}