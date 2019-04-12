var button = document.getElementById("submit-login");
button.addEventListener("click", checkform());

function checkform() {
var newName = document.getElementsByName('email').values(),
    xhr = new XMLHttpRequest();
xhr.open('POST', 'test.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
xhr.send(encodeURI('name=' + newName));
}