var input = document.getElementById('username');
input.oninvalid = function(event) {
    event.target.setCustomValidity('Username should only contain lowercase letters. e.g. john');
}
var input = document.getElementById('lastaname');
input.oninvalid = function(event) {
    event.target.setCustomValidity('Lastname should only contain lowercase letters. e.g. perez');
}